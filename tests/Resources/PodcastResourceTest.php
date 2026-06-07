<?php

declare(strict_types=1);

namespace Deezer\Tests\Resources;

use Deezer\DeezerAPIException;

class PodcastResourceTest extends AbstractResourceTest
{
    private const ID = 898412;

    /**
     * @throws DeezerAPIException
     */
    public function testGet()
    {
        $api = $this->setupApi(
            "GET",
            "/podcast/" . self::ID,
            [],
            [],
            "podcast/view"
        );

        $response = $api->podcast->get(self::ID);

        $this->assertObjectHasProperty("id", $response);
        $this->assertEquals(self::ID, $response->id);
        $this->assertEquals("podcast", $response->type);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGetEpisodes()
    {
        $api = $this->setupApi(
            "GET",
            "/podcast/" . self::ID . "/episodes",
            [],
            [],
            "podcast/episodes"
        );

        $response = $api->podcast->getEpisodes(self::ID);

        $this->assertObjectHasProperty("data", $response);
        foreach ($response->data as $datum) {
            $this->assertEquals("episode", $datum->type);
        }
    }
}
