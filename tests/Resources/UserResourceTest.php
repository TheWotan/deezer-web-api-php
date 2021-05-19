<?php

require_once "AbstractResourceTest.php";

class UserResourceTest extends AbstractResourceTest
{
    private $id = 3110477044;

    public function testRealGet()
    {
        $response = $this->apiReal->user->get($this->id);

        $this->assertEquals($this->id, $response->id);
    }

    public function testGet()
    {
        $api = $this->setupApi(
            "GET",
            "/user/{$this->id}",
            [],
            [],
            "user/view"
        );

        $response = $api->user->get($this->id);

        $this->assertObjectHasAttribute("id", $response);
    }
}
