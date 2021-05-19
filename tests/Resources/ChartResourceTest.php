<?php

require_once "AbstractResourceTest.php";

class ChartResourceTest extends AbstractResourceTest
{
    private $id = 0;

    public function testRealGet()
    {
        $response = $this->apiReal->chart->get($this->id);

        $this->assertObjectHasAttribute("tracks", $response);
        $this->assertObjectHasAttribute("albums", $response);
        $this->assertObjectHasAttribute("artists", $response);
        $this->assertObjectHasAttribute("playlists", $response);
        $this->assertObjectHasAttribute("podcasts", $response);
    }

    public function testGet()
    {
        $api = $this->setupApi(
            "GET",
            "/chart/{$this->id}",
            [],
            [],
            "chart/view"
        );

        $response = $api->chart->get($this->id);

        $this->assertObjectHasAttribute("tracks", $response);
        $this->assertObjectHasAttribute("albums", $response);
        $this->assertObjectHasAttribute("artists", $response);
        $this->assertObjectHasAttribute("playlists", $response);
        $this->assertObjectHasAttribute("podcasts", $response);
    }

    public function testGetTracks()
    {
        $api = $this->setupApi(
            "GET",
            "/chart/{$this->id}/tracks",
            [],
            [],
            "chart/tracks"
        );

        $response = $api->chart->getTracks($this->id);

        $this->assertObjectHasAttribute("data", $response);
    }

    public function testGetAlbums()
    {
        $api = $this->setupApi(
            "GET",
            "/chart/{$this->id}/albums",
            [],
            [],
            "chart/albums"
        );

        $response = $api->chart->getAlbums($this->id);

        $this->assertObjectHasAttribute("data", $response);
    }

    public function testGetArtists()
    {
        $api = $this->setupApi(
            "GET",
            "/chart/{$this->id}/artists",
            [],
            [],
            "chart/artists"
        );

        $response = $api->chart->getArtists($this->id);

        $this->assertObjectHasAttribute("data", $response);
    }

    public function testGetPlaylists()
    {
        $api = $this->setupApi(
            "GET",
            "/chart/{$this->id}/playlists",
            [],
            [],
            "chart/playlists"
        );

        $response = $api->chart->getPlaylists($this->id);

        $this->assertObjectHasAttribute("data", $response);
    }

    public function testGetPodcasts()
    {
        $api = $this->setupApi(
            "GET",
            "/chart/{$this->id}/podcasts",
            [],
            [],
            "chart/podcasts"
        );

        $response = $api->chart->getPodcasts($this->id);

        $this->assertObjectHasAttribute("data", $response);
    }
}
