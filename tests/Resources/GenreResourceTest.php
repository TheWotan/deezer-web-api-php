<?php

require_once "AbstractResourceTest.php";

class GenreResourceTest extends AbstractResourceTest
{
    private $id = 132;

    public function testRealGet()
    {
        $response = $this->apiReal->editorial->get($this->id);

        $this->assertEquals($this->id, $response->id);
    }

    public function testGet()
    {
        $api = $this->setupApi(
            "GET",
            "/genre/{$this->id}",
            [],
            [],
            "genre/view"
        );

        $response = $api->genre->get($this->id);

        $this->assertObjectHasAttribute("id", $response);
    }

    public function testList()
    {
        $api = $this->setupApi(
            "GET",
            "/genre",
            [],
            [],
            "genre/index"
        );

        $response = $api->genre->list();

        $this->assertObjectHasAttribute("data", $response);
    }

    public function testGetArtists()
    {
        $api = $this->setupApi(
            "GET",
            "/genre/{$this->id}/artists",
            [],
            [],
            "genre/artists"
        );

        $response = $api->genre->getArtists($this->id);

        $this->assertObjectHasAttribute("data", $response);
    }

    public function testGetRadios()
    {
        $api = $this->setupApi(
            "GET",
            "/genre/{$this->id}/radios",
            [],
            [],
            "genre/radios"
        );

        $response = $api->genre->getRadios($this->id);

        $this->assertObjectHasAttribute("data", $response);
    }
}
