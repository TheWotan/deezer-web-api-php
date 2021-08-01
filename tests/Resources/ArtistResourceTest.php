<?php

declare(strict_types=1);

use Deezer\DeezerAPIException;

require_once __DIR__ . "/AbstractResourceTest.php";

class ArtistResourceTest extends AbstractResourceTest
{
    private const ID = 302127;
    private const NAME = "Abdullah Kershi and Ahmed Sherif"; //todo: wtf?

    /**
     * @throws DeezerAPIException
     */
    public function testRealGet()
    {
        $response = $this->apiReal->artist->get(self::ID);

        $this->assertEquals(self::ID, $response->id);
        $this->assertEquals(self::NAME, $response->name);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGet()
    {
        $api = $this->setupApi(
            "GET",
            "/artist/" . self::ID,
            [],
            [],
            "artist/view"
        );

        $response = $api->artist->get(self::ID);

        $this->assertObjectHasAttribute("id", $response);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGetTop()
    {
        $api = $this->setupApi(
            "GET",
            "/artist/" . self::ID . "/top",
            [],
            [],
            "artist/top"
        );

        $response = $api->artist->getTop(self::ID);

        $this->assertObjectHasAttribute("data", $response);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGetAlbums()
    {
        $api = $this->setupApi(
            "GET",
            "/artist/" . self::ID . "/albums",
            [],
            [],
            "artist/albums"
        );

        $response = $api->artist->getAlbums(self::ID);

        $this->assertObjectHasAttribute("data", $response);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGetRelated()
    {
        $api = $this->setupApi(
            "GET",
            "/artist/" . self::ID . "/related",
            [],
            [],
            "artist/related"
        );

        $response = $api->artist->getRelated(self::ID);

        $this->assertObjectHasAttribute("data", $response);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGetRadio()
    {
        $api = $this->setupApi(
            "GET",
            "/artist/" . self::ID . "/radio",
            [],
            [],
            "artist/radio"
        );

        $response = $api->artist->getRadio(self::ID);

        $this->assertObjectHasAttribute("data", $response);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGetFans()
    {
        $api = $this->setupApi(
            "GET",
            "/artist/" . self::ID . "/fans",
            [],
            [],
            "artist/fans"
        );

        $response = $api->artist->getFans(self::ID);

        $this->assertObjectHasAttribute("data", $response);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGetPlaylists()
    {
        $api = $this->setupApi(
            "GET",
            "/artist/" . self::ID . "/playlists",
            [],
            [],
            "artist/playlists"
        );

        $response = $api->artist->getPlaylists(self::ID);

        $this->assertObjectHasAttribute("data", $response);
    }
}
