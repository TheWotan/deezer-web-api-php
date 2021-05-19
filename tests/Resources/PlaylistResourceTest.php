<?php

require_once "AbstractResourceTest.php";

class PlaylistResourceTest extends AbstractResourceTest
{
    private $id = 8955895882;

    public function testRealGet()
    {
        $response = $this->apiReal->playlist->get($this->id);

        $this->assertEquals($this->id, $response->id);
    }

    public function testGet()
    {
        $api = $this->setupApi(
            "GET",
            "/playlist/{$this->id}",
            [],
            [],
            "playlist/view"
        );

        $response = $api->playlist->get($this->id);

        $this->assertObjectHasAttribute("id", $response);
    }

    public function testGetTracks()
    {
        $api = $this->setupApi(
            "GET",
            "/playlist/{$this->id}/tracks",
            [],
            [],
            "playlist/tracks"
        );

        $response = $api->playlist->getTracks($this->id);

        $this->assertObjectHasAttribute("data", $response);
    }

    public function testGetFans()
    {
        $api = $this->setupApi(
            "GET",
            "/playlist/{$this->id}/fans",
            [],
            [],
            "playlist/fans"
        );

        $response = $api->playlist->getFans($this->id);

        $this->assertObjectHasAttribute("data", $response);
    }
}
