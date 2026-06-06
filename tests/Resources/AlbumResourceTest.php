<?php

declare(strict_types=1);

use Deezer\DeezerAPI;
use Deezer\DeezerAPIException;
use Deezer\Request;

require_once __DIR__ . "/AbstractResourceTest.php";

class AlbumResourceTest extends AbstractResourceTest
{
    private const ID = 302127;
    private const TITLE = "Discovery";

    /**
     * @throws DeezerAPIException
     */
    public function testRealGet()
    {
        $response = $this->apiReal->album->get(self::ID);

        $this->assertEquals(self::ID, $response->id);
        $this->assertEquals(self::TITLE, $response->title);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGet()
    {
        $api = $this->setupApi(
            "GET",
            "/album/" . self::ID,
            [],
            [],
            "album/view"
        );

        $response = $api->album->get(self::ID);

        $this->assertObjectHasAttribute("id", $response);
        $this->assertEquals("album", $response->type);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGetFans()
    {
        $api = $this->setupApi(
            "GET",
            "/album/" . self::ID . "/fans",
            [],
            [],
            "album/fans"
        );

        $response = $api->album->getFans(self::ID);

        $this->assertObjectHasAttribute("data", $response);
        foreach ($response->data as $datum) {
            $this->assertEquals("user", $datum->type);
        }
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGetTracks()
    {
        $api = $this->setupApi(
            "GET",
            "/album/" . self::ID . "/tracks",
            [],
            [],
            "album/tracks"
        );

        $response = $api->album->getTracks(self::ID);

        $this->assertObjectHasAttribute("data", $response);
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
        $return = ['body' => json_decode(file_get_contents('tests/fixtures/album/comments.json'))];
        $stub->method('send')
            ->with('GET', Request::API_URL . '/album/302127/comments', [], [])
            ->willReturn($return);
        $stub->method('getLastResponse')->willReturn($return);
        $api = new DeezerAPI([], null, $stub);

        $result = $api->album->getComments(302127);
        $this->assertObjectHasAttribute('data', $result);
    }
}
