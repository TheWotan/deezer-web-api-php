<?php

declare(strict_types=1);

use Deezer\DeezerAPIException;

require_once __DIR__ . "/AbstractResourceTest.php";

class ChartResourceTest extends AbstractResourceTest
{
    private const ID = 0;

    /**
     * @throws DeezerAPIException
     */
    public function testRealGet()
    {
        $response = $this->apiReal->chart->get(self::ID);

        $this->assertObjectHasAttribute("tracks", $response);
        $this->assertObjectHasAttribute("albums", $response);
        $this->assertObjectHasAttribute("artists", $response);
        $this->assertObjectHasAttribute("playlists", $response);
        $this->assertObjectHasAttribute("podcasts", $response);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGet()
    {
        $api = $this->setupApi(
            "GET",
            "/chart/" . self::ID,
            [],
            [],
            "chart/view"
        );

        $response = $api->chart->get(self::ID);

        $this->assertObjectHasAttribute("artists", $response);
        foreach ($response->artists->data as $datum) {
            $this->assertEquals("artist", $datum->type);
        }
        $this->assertObjectHasAttribute("tracks", $response);
        foreach ($response->tracks->data as $datum) {
            $this->assertEquals("track", $datum->type);
        }
        $this->assertObjectHasAttribute("albums", $response);
        foreach ($response->albums->data as $datum) {
            $this->assertEquals("album", $datum->type);
        }
        $this->assertObjectHasAttribute("playlists", $response);
        foreach ($response->playlists->data as $datum) {
            $this->assertEquals("playlist", $datum->type);
        }
        $this->assertObjectHasAttribute("podcasts", $response);
        foreach ($response->podcasts->data as $datum) {
            $this->assertEquals("podcast", $datum->type);
        }
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGetTracks()
    {
        $api = $this->setupApi(
            "GET",
            "/chart/" . self::ID . "/tracks",
            [],
            [],
            "chart/tracks"
        );

        $response = $api->chart->getTracks(self::ID);

        $this->assertObjectHasAttribute("data", $response);
        foreach ($response->data as $datum) {
            $this->assertEquals("track", $datum->type);
        }
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGetAlbums()
    {
        $api = $this->setupApi(
            "GET",
            "/chart/" . self::ID . "/albums",
            [],
            [],
            "chart/albums"
        );

        $response = $api->chart->getAlbums(self::ID);

        $this->assertObjectHasAttribute("data", $response);
        foreach ($response->data as $datum) {
            $this->assertEquals("album", $datum->type);
        }
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGetArtists()
    {
        $api = $this->setupApi(
            "GET",
            "/chart/" . self::ID . "/artists",
            [],
            [],
            "chart/artists"
        );

        $response = $api->chart->getArtists(self::ID);

        $this->assertObjectHasAttribute("data", $response);
        foreach ($response->data as $datum) {
            $this->assertEquals("artist", $datum->type);
        }
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGetPlaylists()
    {
        $api = $this->setupApi(
            "GET",
            "/chart/" . self::ID . "/playlists",
            [],
            [],
            "chart/playlists"
        );

        $response = $api->chart->getPlaylists(self::ID);

        $this->assertObjectHasAttribute("data", $response);
        foreach ($response->data as $datum) {
            $this->assertEquals("playlist", $datum->type);
        }
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGetPodcasts()
    {
        $api = $this->setupApi(
            "GET",
            "/chart/" . self::ID . "/podcasts",
            [],
            [],
            "chart/podcasts"
        );

        $response = $api->chart->getPodcasts(self::ID);

        $this->assertObjectHasAttribute("data", $response);
        foreach ($response->data as $datum) {
            $this->assertEquals("podcast", $datum->type);
        }
    }
}
