<?php

declare(strict_types=1);

namespace Deezer;

class Request
{
    public const API_URL = 'https://api.deezer.com';

    protected array $lastResponse = [];
    protected array $options = [
        'curl_options' => [],
        'verify_ssl'   => true,
    ];

    /**
     * Constructor
     * Set options.
     *
     * @param array|object $options Optional. Options to set.
     */
    public function __construct($options = [])
    {
        $this->setOptions($options);
    }

    /**
     * Get the latest full response from the Deezer API.
     *
     * @return array Response data.
     * - object body The decoded JSON response body.
     * - array headers Response headers.
     * - int status HTTP status code.
     * - string url The requested URL.
     */
    public function getLastResponse()
    {
        return $this->lastResponse;
    }


    /**
     * Set options
     *
     * @param array|object $options Options to set.
     *
     * @return void
     */
    public function setOptions($options)
    {
        $this->options = array_merge($this->options, (array) $options);
    }



    /**
     * Make a request to Deezer.
     * You'll probably want to use one of the convenience methods instead.
     *
     * @param string $method The HTTP method to use.
     * @param string $url The URL to request.
     * @param array $parameters Optional. Query string parameters or HTTP body, depending on $method.
     * @param array $headers Optional. HTTP headers.
     *
     * @throws DeezerAPIException
     *
     * @return array Response data.
     * - object body The decoded JSON response body.
     * - array headers Response headers.
     * - int status HTTP status code.
     * - string url The requested URL.
     */
    public function send($method, $url, $parameters = [], $headers = [])
    {
        // Reset any old responses
        $this->lastResponse = [];

        // Sometimes a stringified JSON object is passed
        if (is_array($parameters) || is_object($parameters)) {
            $parameters = http_build_query($parameters, '', '&');
        }

        $options = [
            CURLOPT_ENCODING => '',
            CURLOPT_HEADER => true,
            CURLOPT_HTTPHEADER => [],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => rtrim($url, '/'),
        ];

        if ($this->options['verify_ssl']) {
            $options[CURLOPT_CAINFO] = __DIR__ . '/cacert.pem';
            $options[CURLOPT_SSL_VERIFYPEER] = true;
        } else {
            $options[CURLOPT_SSL_VERIFYPEER] = false;
        }

        foreach ($headers as $key => $val) {
            $options[CURLOPT_HTTPHEADER][] = "$key: $val";
        }

        $method = strtoupper($method);

        switch ($method) {
            case 'DELETE':
                $options[CURLOPT_CUSTOMREQUEST] = 'DELETE';
                if ($parameters) {
                    $options[CURLOPT_POSTFIELDS] = $parameters;
                }
                break;
            case 'PUT':
                $options[CURLOPT_CUSTOMREQUEST] = 'PUT';
                $options[CURLOPT_POSTFIELDS] = $parameters;

                break;
            case 'POST':
                $options[CURLOPT_POST] = true;
                $options[CURLOPT_POSTFIELDS] = $parameters;

                break;
            default:
                $options[CURLOPT_CUSTOMREQUEST] = $method;

                if ($parameters) {
                    $options[CURLOPT_URL] .= '/?' . $parameters;
                }

                break;
        }

        $ch = curl_init();

        curl_setopt_array($ch, array_replace($options, $this->options['curl_options']));

        $response = curl_exec($ch);

        if (curl_error($ch)) {
            $errno = curl_errno($ch);
            $error = curl_error($ch);
            curl_close($ch);

            throw new DeezerAPIException('cURL transport error: ' . $errno . ' ' . $error);
        }

        [$headers, $body] = $this->splitResponse($response);

        $bodyParsed = json_decode($body);
        if (json_last_error() !== JSON_ERROR_NONE) {
            parse_str($body, $bodyParsed);
        }
        $status = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $headers = $this->parseHeaders($headers);

        $this->lastResponse = [
            'body' => $bodyParsed,
            'headers' => $headers,
            'status' => $status,
            'url' => $url,
        ];

        curl_close($ch);

        if ($status === 429) {
            $retryAfter = (int)($headers['retry-after'] ?? 60);
            throw new DeezerRateLimitException($retryAfter);
        }

        if ($status >= 400) {
            $this->handleResponseError($bodyParsed, $status);
        }

        if (is_object($bodyParsed) && isset($bodyParsed->error)) {
            $this->handleResponseError($bodyParsed);
        }

        return $this->lastResponse;
    }


    /**
     * Handle response errors.
     *
     * @param array|object $body The parsed response body.
     * @param int $status The HTTP status code, passed along to any exceptions thrown.
     *
     * @throws DeezerAPIException
     *
     * @return void
     */
    protected function handleResponseError($body, $status = null)
    {
        $body = (object) $body;
        $error = $body->error ?? null;

        if (isset($error->message) && isset($error->code)) {
            // API call error
            $exception = new DeezerAPIException($error->message, $error->code);

            if (isset($error->type)) {
                $exception->setType($error->type);
            }

            throw $exception;
        } else {
            // Something went really wrong
            throw new DeezerAPIException('An unknown error occurred.', $status);
        }
    }

    /**
     * Parse HTTP response headers and normalize names.
     *
     * @param string $headers The raw, unparsed response headers.
     *
     * @return array Headers as key–value pairs.
     */
    protected function parseHeaders($headers)
    {
        $headers = str_replace("\r\n", "\n", $headers);
        $headers = explode("\n", $headers);

        array_shift($headers);

        $parsedHeaders = [];
        foreach ($headers as $header) {
            if (strpos($header, ':') === false) {
                continue;
            }
            [$key, $value] = explode(':', $header, 2);

            $key = strtolower($key);
            $parsedHeaders[$key] = trim($value);
        }

        return $parsedHeaders;
    }

    /**
     * Split response into headers and body, taking proxy response headers etc. into account.
     *
     * @param string $response The complete response.
     *
     * @return array An array consisting of two elements, headers and body.
     */
    protected function splitResponse($response)
    {
        $parts = explode("\r\n\r\n", $response, 3);

        // Skip first set of headers for proxied requests etc.
        if (
            preg_match('/^HTTP\/1.\d 100 Continue/', $parts[0]) ||
            preg_match('/^HTTP\/1.\d 200 Connection established/', $parts[0]) ||
            preg_match('/^HTTP\/1.\d 200 Tunnel established/', $parts[0])
        ) {
            return [
                $parts[1],
                $parts[2],
            ];
        }

        return [
            $parts[0],
            $parts[1],
        ];
    }
}
