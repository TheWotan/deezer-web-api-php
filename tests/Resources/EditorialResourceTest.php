<?php

require_once "AbstractResourceTest.php";

class EditorialResourceTest extends AbstractResourceTest
{
    private $id = 0;

    public function testRealGet()
    {
        $response = $this->apiReal->editorial->get($this->id);

        $this->assertEquals($this->id, $response->id);
    }

    public function testGet()
    {
        $api = $this->setupApi(
            "GET",
            "/editorial/{$this->id}",
            [],
            [],
            "editorial/view"
        );

        $response = $api->editorial->get($this->id);

        $this->assertObjectHasAttribute("id", $response);
    }

    public function testList()
    {
        $api = $this->setupApi(
            "GET",
            "/editorial",
            [],
            [],
            "editorial/index"
        );

        $response = $api->editorial->list();

        $this->assertObjectHasAttribute("data", $response);
    }

    public function testGetCharts()
    {
        $api = $this->setupApi(
            "GET",
            "/editorial/{$this->id}/charts",
            [],
            [],
            "editorial/charts"
        );

        $response = $api->editorial->getCharts($this->id);

        $this->assertObjectHasAttribute("artists", $response);
        $this->assertObjectHasAttribute("tracks", $response);
        $this->assertObjectHasAttribute("albums", $response);
        $this->assertObjectHasAttribute("playlists", $response);
        $this->assertObjectHasAttribute("podcasts", $response);
    }

    public function testGetSelection()
    {
        $api = $this->setupApi(
            "GET",
            "/editorial/{$this->id}/selection",
            [],
            [],
            "editorial/selection"
        );

        $response = $api->editorial->getSelection($this->id);

        $this->assertObjectHasAttribute("data", $response);
    }

    public function testGetReleases()
    {
        $api = $this->setupApi(
            "GET",
            "/editorial/{$this->id}/releases",
            [],
            [],
            "editorial/releases"
        );

        $response = $api->editorial->getReleases($this->id);

        $this->assertObjectHasAttribute("data", $response);
    }
}
