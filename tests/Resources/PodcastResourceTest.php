<?php

declare(strict_types=1);

use Deezer\DeezerAPIException;

require_once __DIR__ . "/AbstractResourceTest.php";

class PodcastResourceTest extends AbstractResourceTest
{
    private const ID = 1835;

    /**
     * @throws DeezerAPIException
     */
    public function testRealGet()
    {
        $response = $this->apiReal->podcast->get(self::ID);

        $this->assertEquals(self::ID, $response->id);
    }

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

        $this->assertObjectHasAttribute("id", $response);
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

        $this->assertObjectHasAttribute("data", $response);
        foreach ($response->data as $datum) {
            $this->assertEquals("episode", $datum->type);
        }
    }
}
