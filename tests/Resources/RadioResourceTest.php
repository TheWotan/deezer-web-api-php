<?php

declare(strict_types=1);

use Deezer\DeezerAPIException;

require_once __DIR__ . "/AbstractResourceTest.php";

class RadioResourceTest extends AbstractResourceTest
{
    private const ID = 6;

    /**
     * @throws DeezerAPIException
     */
    public function testRealGet()
    {
        $response = $this->apiReal->radio->get(self::ID);

        $this->assertEquals(self::ID, $response->id);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGet()
    {
        $api = $this->setupApi(
            "GET",
            "/radio/" . self::ID,
            [],
            [],
            "radio/view"
        );

        $response = $api->radio->get(self::ID);

        $this->assertObjectHasAttribute("id", $response);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testList()
    {
        $api = $this->setupApi(
            "GET",
            "/radio",
            [],
            [],
            "radio/index"
        );

        $response = $api->radio->list();

        $this->assertObjectHasAttribute("data", $response);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGetGenres()
    {
        $api = $this->setupApi(
            "GET",
            "/radio/genres",
            [],
            [],
            "radio/genres"
        );

        $response = $api->radio->getGenres();

        $this->assertObjectHasAttribute("data", $response);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGetLists()
    {
        $api = $this->setupApi(
            "GET",
            "/radio/lists",
            [],
            [],
            "radio/lists"
        );

        $response = $api->radio->getLists();

        $this->assertObjectHasAttribute("data", $response);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGetTop()
    {
        $api = $this->setupApi(
            "GET",
            "/radio/top",
            [],
            [],
            "radio/top"
        );

        $response = $api->radio->getTop();

        $this->assertObjectHasAttribute("data", $response);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGetTracks()
    {
        $api = $this->setupApi(
            "GET",
            "/radio/" . self::ID . "/tracks",
            [],
            [],
            "radio/tracks"
        );

        $response = $api->radio->getTracks(self::ID);

        $this->assertObjectHasAttribute("data", $response);
    }
}
