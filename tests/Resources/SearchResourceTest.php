<?php

require_once "AbstractResourceTest.php";

class SearchResourceTest extends AbstractResourceTest
{
    private $query = 'eminem';

    public function testRealGet()
    {
        $response = $this->apiReal->search->search($this->query);

        $this->assertObjectHasAttribute("data", $response);
    }

    public function testSearch()
    {
        $api = $this->setupApi(
            "GET",
            "/search",
            ['q' => $this->query],
            [],
            "search/index"
        );

        $response = $api->search->search($this->query);

        $this->assertObjectHasAttribute("data", $response);
    }

    public function testTrack()
    {
        $api = $this->setupApi(
            "GET",
            "/search/track",
            ['q' => $this->query],
            [],
            "search/track"
        );

        $response = $api->search->track($this->query);

        $this->assertObjectHasAttribute("data", $response);
    }

    public function testAlbum()
    {
        $api = $this->setupApi(
            "GET",
            "/search/album",
            ['q' => $this->query],
            [],
            "search/album"
        );

        $response = $api->search->album($this->query);

        $this->assertObjectHasAttribute("data", $response);
    }

    public function testArtist()
    {
        $api = $this->setupApi(
            "GET",
            "/search/artist",
            ['q' => $this->query],
            [],
            "search/artist"
        );

        $response = $api->search->artist($this->query);

        $this->assertObjectHasAttribute("data", $response);
    }

    public function testPlaylist()
    {
        $api = $this->setupApi(
            "GET",
            "/search/playlist",
            ['q' => $this->query],
            [],
            "search/playlist"
        );

        $response = $api->search->playlist($this->query);

        $this->assertObjectHasAttribute("data", $response);
    }

    public function testRadio()
    {
        $api = $this->setupApi(
            "GET",
            "/search/radio",
            ['q' => $this->query],
            [],
            "search/radio"
        );

        $response = $api->search->radio($this->query);

        $this->assertObjectHasAttribute("data", $response);
    }

    public function testUser()
    {
        $api = $this->setupApi(
            "GET",
            "/search/user",
            ['q' => $this->query],
            [],
            "search/user"
        );

        $response = $api->search->user($this->query);

        $this->assertObjectHasAttribute("data", $response);
    }
}
