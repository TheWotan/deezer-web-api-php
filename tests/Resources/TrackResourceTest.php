<?php

require_once "AbstractResourceTest.php";

class TrackResourceTest extends AbstractResourceTest
{
    private $id = 3135556;

    public function testRealGet()
    {
        $response = $this->apiReal->track->get($this->id);

        $this->assertEquals($this->id, $response->id);
    }

    public function testGet()
    {
        $api = $this->setupApi(
            "GET",
            "/track/{$this->id}",
            [],
            [],
            "track/view"
        );

        $response = $api->track->get($this->id);

        $this->assertObjectHasAttribute("id", $response);
    }
}
