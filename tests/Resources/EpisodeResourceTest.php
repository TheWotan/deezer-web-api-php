<?php

declare(strict_types=1);

use Deezer\DeezerAPIException;

require_once __DIR__ . "/AbstractResourceTest.php";

class EpisodeResourceTest extends AbstractResourceTest
{
    private const ID = 58275;

    /**
     * @throws DeezerAPIException
     */
    public function testRealGet()
    {
        $response = $this->apiReal->episode->get(self::ID);

        $this->assertEquals(self::ID, $response->id);
    }

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

        $this->assertObjectHasAttribute("id", $response);
        $this->assertEquals(self::ID, $response->id);
        $this->assertEquals("episode", $response->type);
    }
}
