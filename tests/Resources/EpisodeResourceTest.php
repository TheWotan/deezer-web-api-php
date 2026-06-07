<?php

declare(strict_types=1);

namespace Deezer\Tests\Resources;

use Deezer\DeezerAPIException;

class EpisodeResourceTest extends AbstractResourceTest
{
    private const ID = 96791792;

    /**
     * @throws DeezerAPIException
     */
    public function testGet()
    {
        $api = $this->setupApi(
            "GET",
            "/episode/" . self::ID,
            [],
            [],
            "episode/view"
        );

        $response = $api->episode->get(self::ID);

        $this->assertObjectHasProperty("id", $response);
        $this->assertEquals(self::ID, $response->id);
        $this->assertEquals("episode", $response->type);
    }
}
