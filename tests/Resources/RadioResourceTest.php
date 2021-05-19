<?php

require_once "AbstractResourceTest.php";

class RadioResourceTest extends AbstractResourceTest
{
    private $id = 6;

    public function testRealGet()
    {
        $response = $this->apiReal->radio->get($this->id);

        $this->assertEquals($this->id, $response->id);
    }

    public function testGet()
    {
        $api = $this->setupApi(
            "GET",
            "/radio/{$this->id}",
            [],
            [],
            "radio/view"
        );

        $response = $api->radio->get($this->id);

        $this->assertObjectHasAttribute("id", $response);
    }

    public function testList()
    {
        $api = $this->setupApi(
            "GET",
            "/radio",
            [],
            [],
            "radio/index"
        );

        $response = $api->radio->list();

        $this->assertObjectHasAttribute("data", $response);
    }

    public function testGetGenres()
    {
        $api = $this->setupApi(
            "GET",
            "/radio/genres",
            [],
            [],
            "radio/genres"
        );

        $response = $api->radio->getGenres();

        $this->assertObjectHasAttribute("data", $response);
    }

    public function testGetLists()
    {
        $api = $this->setupApi(
            "GET",
            "/radio/lists",
            [],
            [],
            "radio/lists"
        );

        $response = $api->radio->getLists();

        $this->assertObjectHasAttribute("data", $response);
    }

    public function testGetTop()
    {
        $api = $this->setupApi(
            "GET",
            "/radio/top",
            [],
            [],
            "radio/top"
        );

        $response = $api->radio->getTop();

        $this->assertObjectHasAttribute("data", $response);
    }

    public function testGetTracks()
    {
        $api = $this->setupApi(
            "GET",
            "/radio/{$this->id}/tracks",
            [],
            [],
            "radio/tracks"
        );

        $response = $api->radio->getTracks($this->id);

        $this->assertObjectHasAttribute("data", $response);
    }
}
