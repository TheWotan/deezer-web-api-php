<?php

declare(strict_types=1);

use Deezer\DeezerAPIException;

require_once __DIR__ . "/AbstractResourceTest.php";

class GenreResourceTest extends AbstractResourceTest
{
    private const ID = 132;

    /**
     * @throws DeezerAPIException
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

        $this->assertObjectHasAttribute("id", $response);
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

        $this->assertObjectHasAttribute("data", $response);
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

        $this->assertObjectHasAttribute("data", $response);
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

        $this->assertObjectHasAttribute("data", $response);
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

        // Stop here and mark this test as incomplete.
        $this->markTestSkipped(
            'Not supported.'
        );

        $response = $api->genre->getPodcasts(self::ID);

        $this->assertObjectHasAttribute("data", $response);
    }
}
