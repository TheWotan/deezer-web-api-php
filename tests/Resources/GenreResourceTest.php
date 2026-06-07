<?php

declare(strict_types=1);

namespace Deezer\Tests\Resources;

use Deezer\DeezerAPIException;

class GenreResourceTest extends AbstractResourceTest
{
    private const ID = 132;

    /**
     * @throws DeezerAPIException
     * @group real-api
     */
    public function testRealGet()
    {
        $response = $this->apiReal->editorial->get(self::ID);

        $this->assertEquals(self::ID, $response->id);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGet()
    {
        $api = $this->setupApi(
            "GET",
            "/genre/" . self::ID,
            [],
            [],
            "genre/view"
        );

        $response = $api->genre->get(self::ID);

        $this->assertObjectHasProperty("id", $response);
        $this->assertEquals(self::ID, $response->id);
        $this->assertEquals('genre', $response->type);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testList()
    {
        $api = $this->setupApi(
            "GET",
            "/genre",
            [],
            [],
            "genre/index"
        );

        $response = $api->genre->list();

        $this->assertObjectHasProperty("data", $response);
        foreach ($response->data as $datum) {
            $this->assertEquals("genre", $datum->type);
        }
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGetArtists()
    {
        $api = $this->setupApi(
            "GET",
            "/genre/" . self::ID . "/artists",
            [],
            [],
            "genre/artists"
        );

        $response = $api->genre->getArtists(self::ID);

        $this->assertObjectHasProperty("data", $response);
        foreach ($response->data as $datum) {
            $this->assertEquals("artist", $datum->type);
        }
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGetRadios()
    {
        $api = $this->setupApi(
            "GET",
            "/genre/" . self::ID . "/radios",
            [],
            [],
            "genre/radios"
        );

        $response = $api->genre->getRadios(self::ID);

        $this->assertObjectHasProperty("data", $response);
        foreach ($response->data as $datum) {
            $this->assertEquals("radio", $datum->type);
        }
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGetPodcasts()
    {
        $api = $this->setupApi(
            "GET",
            "/genre/" . self::ID . "/podcasts",
            [],
            [],
            "genre/podcasts"
        );

        $response = $api->genre->getPodcasts(self::ID);

        $this->assertObjectHasProperty("data", $response);

        foreach ($response->data as $datum) {
            $this->assertEquals("podcast", $datum->type);
        }
    }
}
