<?php

declare(strict_types=1);

namespace Deezer\Tests\Resources;

use Deezer\DeezerAPIException;

class ChartResourceTest extends AbstractResourceTest
{
    private const ID = 0;

    /**
     * @throws DeezerAPIException
     * @group real-api
     */
    public function testRealGet()
    {
        $response = $this->apiReal->chart->get(self::ID);

        $this->assertObjectHasProperty("tracks", $response);
        $this->assertObjectHasProperty("albums", $response);
        $this->assertObjectHasProperty("artists", $response);
        $this->assertObjectHasProperty("playlists", $response);
        $this->assertObjectHasProperty("podcasts", $response);
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

        $this->assertObjectHasProperty("artists", $response);
        foreach ($response->artists->data as $datum) {
            $this->assertEquals("artist", $datum->type);
        }
        $this->assertObjectHasProperty("tracks", $response);
        foreach ($response->tracks->data as $datum) {
            $this->assertEquals("track", $datum->type);
        }
        $this->assertObjectHasProperty("albums", $response);
        foreach ($response->albums->data as $datum) {
            $this->assertEquals("album", $datum->type);
        }
        $this->assertObjectHasProperty("playlists", $response);
        foreach ($response->playlists->data as $datum) {
            $this->assertEquals("playlist", $datum->type);
        }
        $this->assertObjectHasProperty("podcasts", $response);
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

        $this->assertObjectHasProperty("data", $response);
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

        $this->assertObjectHasProperty("data", $response);
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

        $this->assertObjectHasProperty("data", $response);
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

        $this->assertObjectHasProperty("data", $response);
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

        $this->assertObjectHasProperty("data", $response);
        foreach ($response->data as $datum) {
            $this->assertEquals("podcast", $datum->type);
        }
    }
}
