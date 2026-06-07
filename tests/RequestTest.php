<?php

declare(strict_types=1);

namespace Deezer\Tests;

use PHPUnit\Framework\TestCase;
use Deezer\Request;
use Deezer\DeezerAPIException;

class RequestTest extends TestCase
{
    protected function setUp(): void
    {
        \Deezer\CurlMock::reset();
    }

    public function testParseHeadersSkipsLinesWithoutColon(): void
    {
        $request = new Request();
        $method = new \ReflectionMethod(Request::class, 'parseHeaders');
        if (PHP_VERSION_ID < 80100) {
            $method->setAccessible(true);
        }

        $raw = "HTTP/1.1 200 OK\r\nContent-Type: application/json\r\n\r\n";
        $result = $method->invoke($request, $raw);

        $this->assertArrayHasKey('content-type', $result);
        $this->assertArrayNotHasKey('', $result);
    }

    public function testHandleResponseErrorThrowsWithParsedBody(): void
    {
        $request = new Request();
        $method = new \ReflectionMethod(Request::class, 'handleResponseError');
        if (PHP_VERSION_ID < 80100) {
            $method->setAccessible(true);
        }

        $body = json_decode(file_get_contents('tests/fixtures/error.json'));

        $this->expectException(\Deezer\DeezerAPIException::class);
        $this->expectExceptionMessage('no data');
        $this->expectExceptionCode(800);

        $method->invoke($request, $body, 400);
    }

    public function testSplitResponseNormalCase(): void
    {
        $request = new Request();
        $method = new \ReflectionMethod(Request::class, 'splitResponse');
        if (PHP_VERSION_ID < 80100) {
            $method->setAccessible(true);
        }

        $response = "HTTP/1.1 200 OK\r\nContent-Type: application/json\r\n\r\n{\"id\":1}";
        [$headers, $body] = $method->invoke($request, $response);

        $this->assertStringContainsString('Content-Type', $headers);
        $this->assertSame('{"id":1}', $body);
    }

    public function testSplitResponseSkipsProxyHeaders(): void
    {
        $request = new Request();
        $method = new \ReflectionMethod(Request::class, 'splitResponse');
        if (PHP_VERSION_ID < 80100) {
            $method->setAccessible(true);
        }

        $response = "HTTP/1.1 200 Connection established\r\n\r\n"
            . "HTTP/1.1 200 OK\r\nContent-Type: application/json\r\n\r\n{\"id\":1}";
        [$headers, $body] = $method->invoke($request, $response);

        $this->assertStringContainsString('Content-Type', $headers);
        $this->assertSame('{"id":1}', $body);
    }

    public function testHandleResponseErrorSetsType(): void
    {
        $request = new Request();
        $method = new \ReflectionMethod(Request::class, 'handleResponseError');
        if (PHP_VERSION_ID < 80100) {
            $method->setAccessible(true);
        }

        $body = (object)['error' => (object)['message' => 'Forbidden', 'code' => 403, 'type' => 'OAuthException']];

        try {
            $method->invoke($request, $body, 403);
            $this->fail('Expected exception');
        } catch (\Deezer\DeezerAPIException $e) {
            $this->assertSame('Forbidden', $e->getMessage());
            $this->assertSame('OAuthException', $e->getType());
        }
    }

    public function testHandleResponseErrorUnknownError(): void
    {
        $request = new Request();
        $method = new \ReflectionMethod(Request::class, 'handleResponseError');
        if (PHP_VERSION_ID < 80100) {
            $method->setAccessible(true);
        }

        $this->expectException(\Deezer\DeezerAPIException::class);
        $this->expectExceptionMessage('An unknown error occurred.');

        $method->invoke($request, (object)[], 500);
    }

    public function testSetOptionsAndGetLastResponse(): void
    {
        $request = new Request(['verify_ssl' => false]);
        $this->assertSame([], $request->getLastResponse());
    }

    public function testSendGetRequestReturnsBody(): void
    {
        \Deezer\CurlMock::$active = true;
        \Deezer\CurlMock::$response = "HTTP/1.1 200 OK\r\nContent-Type: application/json\r\n\r\n{\"id\":1}";
        \Deezer\CurlMock::$httpCode = 200;

        $request = new Request();
        $result = $request->send('GET', 'https://api.deezer.com/album/1');

        $this->assertSame(1, $result['body']->id);
        $this->assertSame(200, $result['status']);
    }

    public function testSendPostRequest(): void
    {
        \Deezer\CurlMock::$active = true;
        \Deezer\CurlMock::$response = "HTTP/1.1 200 OK\r\nContent-Type: application/json\r\n\r\n{\"id\":2}";
        \Deezer\CurlMock::$httpCode = 200;

        $request = new Request();
        $result = $request->send('POST', 'https://api.deezer.com/playlist', ['title' => 'My Playlist']);

        $this->assertSame(2, $result['body']->id);
    }

    public function testSendDeleteRequest(): void
    {
        \Deezer\CurlMock::$active = true;
        \Deezer\CurlMock::$response = "HTTP/1.1 200 OK\r\nContent-Type: application/json\r\n\r\ntrue";
        \Deezer\CurlMock::$httpCode = 200;

        $request = new Request();
        $result = $request->send('DELETE', 'https://api.deezer.com/playlist/1');

        $this->assertSame(200, $result['status']);
    }

    public function testSendPutRequest(): void
    {
        \Deezer\CurlMock::$active = true;
        \Deezer\CurlMock::$response = "HTTP/1.1 200 OK\r\nContent-Type: application/json\r\n\r\n{\"id\":3}";
        \Deezer\CurlMock::$httpCode = 200;

        $request = new Request();
        $result = $request->send('PUT', 'https://api.deezer.com/resource/1', ['key' => 'value']);

        $this->assertSame(3, $result['body']->id);
    }

    public function testSendThrowsOnCurlError(): void
    {
        \Deezer\CurlMock::$active = true;
        \Deezer\CurlMock::$response = '';
        \Deezer\CurlMock::$error = 'Could not connect';
        \Deezer\CurlMock::$errno = 7;

        $request = new Request();

        $this->expectException(\Deezer\DeezerAPIException::class);
        $this->expectExceptionMessage('cURL transport error: 7 Could not connect');

        $request->send('GET', 'https://api.deezer.com/album/1');
    }

    public function testSendThrowsOn429(): void
    {
        \Deezer\CurlMock::$active = true;
        \Deezer\CurlMock::$response = "HTTP/1.1 429 Too Many Requests\r\nRetry-After: 30\r\n\r\n"
            . "{\"error\":{\"type\":\"RateLimitError\",\"message\":\"Rate limit\",\"code\":4}}";
        \Deezer\CurlMock::$httpCode = 429;

        $request = new Request();

        $this->expectException(\Deezer\DeezerRateLimitException::class);

        $request->send('GET', 'https://api.deezer.com/album/1');
    }

    public function testSendThrowsOn400(): void
    {
        \Deezer\CurlMock::$active = true;
        \Deezer\CurlMock::$response = "HTTP/1.1 400 Bad Request\r\nContent-Type: application/json\r\n\r\n"
            . "{\"error\":{\"type\":\"DataException\",\"message\":\"no data\",\"code\":800}}";
        \Deezer\CurlMock::$httpCode = 400;

        $request = new Request();

        $this->expectException(\Deezer\DeezerAPIException::class);
        $this->expectExceptionMessage('no data');

        $request->send('GET', 'https://api.deezer.com/album/999999');
    }

    public function testSendHandlesApiErrorInBody(): void
    {
        \Deezer\CurlMock::$active = true;
        \Deezer\CurlMock::$response = "HTTP/1.1 200 OK\r\nContent-Type: application/json\r\n\r\n"
            . "{\"error\":{\"type\":\"DataException\",\"message\":\"no data\",\"code\":800}}";
        \Deezer\CurlMock::$httpCode = 200;

        $request = new Request();

        $this->expectException(\Deezer\DeezerAPIException::class);
        $this->expectExceptionMessage('no data');

        $request->send('GET', 'https://api.deezer.com/album/1');
    }

    public function testSendWithSslVerifyDisabled(): void
    {
        \Deezer\CurlMock::$active = true;
        \Deezer\CurlMock::$response = "HTTP/1.1 200 OK\r\nContent-Type: application/json\r\n\r\n{\"id\":1}";
        \Deezer\CurlMock::$httpCode = 200;

        $request = new Request(['verify_ssl' => false]);
        $result = $request->send('GET', 'https://api.deezer.com/album/1');

        $this->assertSame(200, $result['status']);
    }

    public function testSendWithCustomHeaders(): void
    {
        \Deezer\CurlMock::$active = true;
        \Deezer\CurlMock::$response = "HTTP/1.1 200 OK\r\nContent-Type: application/json\r\n\r\n{\"id\":1}";
        \Deezer\CurlMock::$httpCode = 200;

        $request = new Request();
        $result = $request->send('GET', 'https://api.deezer.com/album/1', [], ['X-Custom' => 'value']);

        $this->assertSame(200, $result['status']);
    }

    public function testGetLastResponseAfterSend(): void
    {
        \Deezer\CurlMock::$active = true;
        \Deezer\CurlMock::$response = "HTTP/1.1 200 OK\r\nContent-Type: application/json\r\n\r\n{\"id\":5}";
        \Deezer\CurlMock::$httpCode = 200;

        $request = new Request();
        $request->send('GET', 'https://api.deezer.com/album/5');
        $last = $request->getLastResponse();

        $this->assertSame(200, $last['status']);
        $this->assertSame(5, $last['body']->id);
    }

    public function testSendWithGetParameters(): void
    {
        \Deezer\CurlMock::$active = true;
        \Deezer\CurlMock::$response = "HTTP/1.1 200 OK\r\nContent-Type: application/json\r\n\r\n{\"data\":[]}";
        \Deezer\CurlMock::$httpCode = 200;

        $request = new Request();
        $result = $request->send('GET', 'https://api.deezer.com/search', ['q' => 'daft punk']);

        $this->assertSame(200, $result['status']);
    }
}
