<?php

declare(strict_types=1);

namespace Deezer\Tests\Resources;

use Deezer\DeezerAPIException;

class TrackResourceTest extends AbstractResourceTest
{
    private const ID = 3135556;

    /**
     * @throws DeezerAPIException
     * @group real-api
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

        $this->assertObjectHasProperty("id", $response);
        $this->assertEquals(self::ID, $response->id);
        $this->assertEquals("track", $response->type);
    }
}
