<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Deezer\Request;
use Deezer\DeezerAPIException;

class RequestTest extends TestCase
{
    public function testParseHeadersSkipsLinesWithoutColon(): void
    {
        $request = new Request();
        $method = new ReflectionMethod(Request::class, 'parseHeaders');
        $method->setAccessible(true);

        $raw = "HTTP/1.1 200 OK\r\nContent-Type: application/json\r\n\r\n";
        $result = $method->invoke($request, $raw);

        $this->assertArrayHasKey('content-type', $result);
        $this->assertArrayNotHasKey('', $result);
    }

    public function testHandleResponseErrorThrowsWithParsedBody(): void
    {
        $request = new Request();
        $method = new ReflectionMethod(Request::class, 'handleResponseError');
        $method->setAccessible(true);

        $body = json_decode(file_get_contents('tests/fixtures/error.json'));

        $this->expectException(\Deezer\DeezerAPIException::class);
        $this->expectExceptionMessage('no data');
        $this->expectExceptionCode(800);

        $method->invoke($request, $body, 400);
    }
}
