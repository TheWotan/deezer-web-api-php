<?php

declare(strict_types=1);

use Deezer\DeezerAPIException;

require_once __DIR__ . "/AbstractResourceTest.php";

class TrackResourceTest extends AbstractResourceTest
{
    private const ID = 3135556;

    /**
     * @throws DeezerAPIException
     */
    public function testRealGet()
    {
        $response = $this->apiReal->track->get(self::ID);

        $this->assertEquals(self::ID, $response->id);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGet()
    {
        $api = $this->setupApi(
            "GET",
            "/track/" . self::ID,
            [],
            [],
            "track/view"
        );

        $response = $api->track->get(self::ID);

        $this->assertObjectHasAttribute("id", $response);
    }
}
