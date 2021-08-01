<?php

declare(strict_types=1);

use Deezer\DeezerAPIException;

require_once __DIR__ . "/AbstractResourceTest.php";

class PlaylistResourceTest extends AbstractResourceTest
{
    private const ID = 8955895882;

    /**
     * @throws DeezerAPIException
     */
    public function testRealGet()
    {
        $response = $this->apiReal->playlist->get(self::ID);

        $this->assertEquals(self::ID, $response->id);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGet()
    {
        $api = $this->setupApi(
            "GET",
            "/playlist/" . self::ID,
            [],
            [],
            "playlist/view"
        );

        $response = $api->playlist->get(self::ID);

        $this->assertObjectHasAttribute("id", $response);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGetTracks()
    {
        $api = $this->setupApi(
            "GET",
            "/playlist/" . self::ID . "/tracks",
            [],
            [],
            "playlist/tracks"
        );

        $response = $api->playlist->getTracks(self::ID);

        $this->assertObjectHasAttribute("data", $response);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGetFans()
    {
        $api = $this->setupApi(
            "GET",
            "/playlist/" . self::ID . "/fans",
            [],
            [],
            "playlist/fans"
        );

        $response = $api->playlist->getFans(self::ID);

        $this->assertObjectHasAttribute("data", $response);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGetRadio()
    {
        $api = $this->setupApi(
            "GET",
            "/playlist/" . self::ID . "/radio",
            [],
            [],
            "playlist/radio"
        );

        $response = $api->playlist->getRadio(self::ID);

        // Stop here and mark this test as incomplete.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );

        $this->assertObjectHasAttribute("data", $response);
    }
}
