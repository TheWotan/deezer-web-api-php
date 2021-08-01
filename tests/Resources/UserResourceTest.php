<?php

declare(strict_types=1);

use Deezer\DeezerAPIException;

require_once __DIR__ . "/AbstractResourceTest.php";

class UserResourceTest extends AbstractResourceTest
{
    private const ID = 3110477044;

    /**
     * @throws DeezerAPIException
     */
    public function testRealGet()
    {
        $response = $this->apiReal->user->get(self::ID);

        $this->assertEquals(self::ID, $response->id);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGet()
    {
        $api = $this->setupApi(
            "GET",
            "/user/" . self::ID,
            [],
            [],
            "user/view"
        );

        $response = $api->user->get(self::ID);

        $this->assertObjectHasAttribute("id", $response);
    }
}
