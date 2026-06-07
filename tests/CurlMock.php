<?php

declare(strict_types=1);

namespace Deezer;

// State holder for mock responses
class CurlMock
{
    public static bool $active = false;
    /** @var string|false */
    public static $response = '';
    public static int $httpCode = 200;
    public static string $error = '';
    public static int $errno = 0;

    public static function reset(): void
    {
        self::$active = false;
        self::$response = '';
        self::$httpCode = 200;
        self::$error = '';
        self::$errno = 0;
    }
}

function curl_init()
{
    return CurlMock::$active ? 'mock_handle' : \curl_init();
}

function curl_setopt_array($ch, array $options)
{
    return CurlMock::$active ? true : \curl_setopt_array($ch, $options);
}

function curl_exec($ch)
{
    return CurlMock::$active ? CurlMock::$response : \curl_exec($ch);
}

function curl_error($ch)
{
    return CurlMock::$active ? CurlMock::$error : \curl_error($ch);
}

function curl_errno($ch)
{
    return CurlMock::$active ? CurlMock::$errno : \curl_errno($ch);
}

function curl_getinfo($ch, $option = null)
{
    if (CurlMock::$active) {
        return $option === CURLINFO_HTTP_CODE ? CurlMock::$httpCode : null;
    }
    return \curl_getinfo($ch, $option);
}

function curl_close($ch)
{
    return CurlMock::$active ? null : \curl_close($ch);
}
