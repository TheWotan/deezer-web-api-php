<?php

declare(strict_types=1);

use Deezer\DeezerAPIException;

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
}
