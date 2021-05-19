<?php

require_once "AbstractResourceTest.php";

class ArtistResourceTest extends AbstractResourceTest
{
    private $id = 27;

    public function testRealGet()
    {
        $response = $this->apiReal->artist->get($this->id);

        $this->assertEquals($this->id, $response->id);
        $this->assertEquals("Daft Punk", $response->name);
    }

    public function testGet()
    {
        $api = $this->setupApi(
            "GET",
            "/artist/{$this->id}",
            [],
            [],
            "artist/view"
        );

        $response = $api->artist->get($this->id);

        $this->assertObjectHasAttribute("id", $response);
    }

    public function testGetTop()
    {
        $api = $this->setupApi(
            "GET",
            "/artist/{$this->id}/top",
            [],
            [],
            "artist/top"
        );

        $response = $api->artist->getTop($this->id);

        $this->assertObjectHasAttribute("data", $response);
    }

    public function testGetAlbums()
    {
        $api = $this->setupApi(
            "GET",
            "/artist/{$this->id}/albums",
            [],
            [],
            "artist/albums"
        );

        $response = $api->artist->getAlbums($this->id);

        $this->assertObjectHasAttribute("data", $response);
    }

    public function testGetRelated()
    {
        $api = $this->setupApi(
            "GET",
            "/artist/{$this->id}/related",
            [],
            [],
            "artist/related"
        );

        $response = $api->artist->getRelated($this->id);

        $this->assertObjectHasAttribute("data", $response);
    }

    public function testGetRadio()
    {
        $api = $this->setupApi(
            "GET",
            "/artist/{$this->id}/radio",
            [],
            [],
            "artist/radio"
        );

        $response = $api->artist->getRadio($this->id);

        $this->assertObjectHasAttribute("data", $response);
    }

    public function testGetFans()
    {
        $api = $this->setupApi(
            "GET",
            "/artist/{$this->id}/fans",
            [],
            [],
            "artist/fans"
        );

        $response = $api->artist->getFans($this->id);

        $this->assertObjectHasAttribute("data", $response);
    }

    public function testGetPlaylists()
    {
        $api = $this->setupApi(
            "GET",
            "/artist/{$this->id}/playlists",
            [],
            [],
            "artist/playlists"
        );

        $response = $api->artist->getPlaylists($this->id);

        $this->assertObjectHasAttribute("data", $response);
    }
}
