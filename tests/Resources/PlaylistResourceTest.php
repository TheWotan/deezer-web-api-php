<?php

declare(strict_types=1);

use Deezer\DeezerAPI;
use Deezer\DeezerAPIException;
use Deezer\Request;

require_once __DIR__ . "/AbstractResourceTest.php";

class PlaylistResourceTest extends AbstractResourceTest
{
    private const ID = 8955895882;

    /**
     * @throws DeezerAPIException
     * @group real-api
     */
    public function testRealGet()
    {
        $response = $this->apiReal->playlist->get(self::ID);

        $this->assertEquals(self::ID, $response->id);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGet()
    {
        $api = $this->setupApi(
            "GET",
            "/playlist/" . self::ID,
            [],
            [],
            "playlist/view"
        );

        $response = $api->playlist->get(self::ID);

        $this->assertObjectHasProperty("id", $response);
        $this->assertEquals(self::ID, $response->id);
        $this->assertEquals('playlist', $response->type);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGetTracks()
    {
        $api = $this->setupApi(
            "GET",
            "/playlist/" . self::ID . "/tracks",
            [],
            [],
            "playlist/tracks"
        );

        $response = $api->playlist->getTracks(self::ID);

        $this->assertObjectHasProperty("data", $response);
        foreach ($response->data as $datum) {
            $this->assertEquals("track", $datum->type);
        }
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGetFans()
    {
        $api = $this->setupApi(
            "GET",
            "/playlist/" . self::ID . "/fans",
            [],
            [],
            "playlist/fans"
        );

        $response = $api->playlist->getFans(self::ID);

        $this->assertObjectHasProperty("data", $response);
        foreach ($response->data as $datum) {
            $this->assertEquals("user", $datum->type);
        }
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGetRadio()
    {
        $api = $this->setupApi(
            "GET",
            "/playlist/" . self::ID . "/radio",
            [],
            [],
            "playlist/radio"
        );

        $response = $api->playlist->getRadio(self::ID);

        $this->assertObjectHasProperty("data", $response);
        foreach ($response->data as $datum) {
            $this->assertEquals("track", $datum->type);
        }
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGetComments(): void
    {
        $stub = $this->createPartialMock(Request::class, ['send', 'getLastResponse']);
        $return = ['body' => json_decode(file_get_contents('tests/fixtures/playlist/comments.json'))];
        $stub->method('send')
            ->with('GET', Request::API_URL . '/playlist/908622995/comments', [], [])
            ->willReturn($return);
        $stub->method('getLastResponse')->willReturn($return);
        $api = new DeezerAPI([], null, $stub);

        $result = $api->playlist->getComments(908622995);
        $this->assertObjectHasProperty('data', $result);
    }

    public function testCreate(): void
    {
        $stub = $this->createPartialMock(Request::class, ['send', 'getLastResponse']);
        $return = ['body' => json_decode('{"id": 888}')];
        $stub->method('send')
            ->with('POST', Request::API_URL . '/user/42/playlists', ['title' => 'New Playlist'], [])
            ->willReturn($return);
        $stub->method('getLastResponse')->willReturn($return);
        $api = new DeezerAPI([], null, $stub);

        $result = $api->playlist->create(42, 'New Playlist');
        $this->assertSame(888, $result->id);
    }

    public function testDelete(): void
    {
        $stub = $this->createPartialMock(Request::class, ['send', 'getLastResponse']);
        $return = ['body' => true];
        $stub->method('send')
            ->with('DELETE', Request::API_URL . '/playlist/888', [], [])
            ->willReturn($return);
        $stub->method('getLastResponse')->willReturn($return);
        $api = new DeezerAPI([], null, $stub);
        $this->assertTrue($api->playlist->delete(888));
    }

    public function testAddTracks(): void
    {
        $stub = $this->createPartialMock(Request::class, ['send', 'getLastResponse']);
        $return = ['body' => true];
        $stub->method('send')
            ->with('POST', Request::API_URL . '/playlist/888/tracks', ['songs' => '1,2,3'], [])
            ->willReturn($return);
        $stub->method('getLastResponse')->willReturn($return);
        $api = new DeezerAPI([], null, $stub);
        $this->assertTrue($api->playlist->addTracks(888, [1, 2, 3]));
    }

    public function testRemoveTracks(): void
    {
        $stub = $this->createPartialMock(Request::class, ['send', 'getLastResponse']);
        $return = ['body' => true];
        $stub->method('send')
            ->with('DELETE', Request::API_URL . '/playlist/888/tracks', ['songs' => '1,2,3'], [])
            ->willReturn($return);
        $stub->method('getLastResponse')->willReturn($return);
        $api = new DeezerAPI([], null, $stub);
        $this->assertTrue($api->playlist->removeTracks(888, [1, 2, 3]));
    }
}
