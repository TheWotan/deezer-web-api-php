<?php

declare(strict_types=1);

use Deezer\DeezerAPIException;

require_once __DIR__ . "/AbstractResourceTest.php";

class SearchResourceTest extends AbstractResourceTest
{
    private const QUERY = 'eminem';

    /**
     * @throws DeezerAPIException
     */
    public function testRealGet()
    {
        $response = $this->apiReal->search->search(self::QUERY);

        $this->assertObjectHasAttribute("data", $response);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testSearch()
    {
        $api = $this->setupApi(
            "GET",
            "/search",
            ['q' => self::QUERY],
            [],
            "search/index"
        );

        $response = $api->search->search(self::QUERY);

        $this->assertObjectHasAttribute("data", $response);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testTrack()
    {
        $api = $this->setupApi(
            "GET",
            "/search/track",
            ['q' => self::QUERY],
            [],
            "search/track"
        );

        $response = $api->search->track(self::QUERY);

        $this->assertObjectHasAttribute("data", $response);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testAlbum()
    {
        $api = $this->setupApi(
            "GET",
            "/search/album",
            ['q' => self::QUERY],
            [],
            "search/album"
        );

        $response = $api->search->album(self::QUERY);

        $this->assertObjectHasAttribute("data", $response);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testArtist()
    {
        $api = $this->setupApi(
            "GET",
            "/search/artist",
            ['q' => self::QUERY],
            [],
            "search/artist"
        );

        $response = $api->search->artist(self::QUERY);

        $this->assertObjectHasAttribute("data", $response);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testPlaylist()
    {
        $api = $this->setupApi(
            "GET",
            "/search/playlist",
            ['q' => self::QUERY],
            [],
            "search/playlist"
        );

        $response = $api->search->playlist(self::QUERY);

        $this->assertObjectHasAttribute("data", $response);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testRadio()
    {
        $api = $this->setupApi(
            "GET",
            "/search/radio",
            ['q' => self::QUERY],
            [],
            "search/radio"
        );

        $response = $api->search->radio(self::QUERY);

        $this->assertObjectHasAttribute("data", $response);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testUser()
    {
        $api = $this->setupApi(
            "GET",
            "/search/user",
            ['q' => self::QUERY],
            [],
            "search/user"
        );

        $response = $api->search->user(self::QUERY);

        $this->assertObjectHasAttribute("data", $response);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testHistory()
    {
        $api = $this->setupApi(
            "GET",
            "/search/history",
            ['q' => self::QUERY],
            [],
            "search/history"
        );

        $response = $api->search->history(self::QUERY);

        // Stop here and mark this test as incomplete.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );

        $this->assertObjectHasAttribute("data", $response);
    }
}
