<?php

require_once "AbstractResourceTest.php";

class AlbumResourceTest extends AbstractResourceTest
{
    private $id = 302127;

    public function testRealGet()
    {
        $response = $this->apiReal->album->get($this->id);

        $this->assertEquals($this->id, $response->id);
        $this->assertEquals("Discovery", $response->title);
    }

    public function testGet()
    {
        $api = $this->setupApi(
            "GET",
            "/album/{$this->id}",
            [],
            [],
            "album/view"
        );

        $response = $api->album->get($this->id);

        $this->assertObjectHasAttribute("id", $response);
    }

    public function testGetFans()
    {
        $api = $this->setupApi(
            "GET",
            "/album/{$this->id}/fans",
            [],
            [],
            "album/fans"
        );

        $response = $api->album->getFans($this->id);

        $this->assertObjectHasAttribute("data", $response);
    }

    public function testGetTracks()
    {
        $api = $this->setupApi(
            "GET",
            "/album/{$this->id}/tracks",
            [],
            [],
            "album/tracks"
        );

        $response = $api->album->getTracks($this->id);

        $this->assertObjectHasAttribute("data", $response);
    }
}
