<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Deezer\DeezerAPI;
use Deezer\Request;

class CommentResourceTest extends TestCase
{
    private function setupApi(string $method, string $uri, array $params, string $fixture): DeezerAPI
    {
        $stub = $this->createPartialMock(Request::class, ['send', 'getLastResponse']);
        $return = ['body' => json_decode(file_get_contents(__DIR__ . "/../fixtures/$fixture.json"))];
        $stub->method('send')
            ->with($method, Request::API_URL . $uri, $params, [])
            ->willReturn($return);
        $stub->method('getLastResponse')->willReturn($return);
        return new DeezerAPI([], null, $stub);
    }

    public function testGet(): void
    {
        $api = $this->setupApi('GET', '/comment/12345', [], 'comment/view');
        $result = $api->comment->get(12345);
        $this->assertSame(12345, $result->id);
        $this->assertSame('Great album!', $result->text);
    }

    public function testDelete(): void
    {
        $stub = $this->createPartialMock(Request::class, ['send', 'getLastResponse']);
        $return = ['body' => true];
        $stub->method('send')
            ->with('DELETE', Request::API_URL . '/comment/12345', [], [])
            ->willReturn($return);
        $stub->method('getLastResponse')->willReturn($return);
        $api = new DeezerAPI([], null, $stub);

        $this->assertTrue($api->comment->delete(12345));
    }
}
