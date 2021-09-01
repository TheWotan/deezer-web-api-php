<?php

declare(strict_types=1);

use Deezer\DeezerAPIException;

require_once __DIR__ . "/AbstractResourceTest.php";

class UserResourceTest extends AbstractResourceTest
{
    private const ID = 3110477044;

    /**
     * @throws DeezerAPIException
     */
    public function testRealGet()
    {
        $response = $this->apiReal->user->get(self::ID);

        $this->assertEquals(self::ID, $response->id);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGet()
    {
        $api = $this->setupApi(
            "GET",
            "/user/" . self::ID,
            [],
            [],
            "user/view"
        );

        $response = $api->user->get(self::ID);

        $this->assertObjectHasAttribute("id", $response);
        $this->assertEquals("user", $response->type);
        $this->assertEquals(self::ID, $response->id);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testMe()
    {
        $api = $this->setupApi(
            "GET",
            "/user/me",
            [],
            [],
            "user/me"
        );

        $response = $api->user->me();

        $this->assertObjectHasAttribute("id", $response);
        $this->assertEquals("user", $response->type);
        $this->assertEquals(self::ID, $response->id);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testAlbums()
    {
        $api = $this->setupApi(
            "GET",
            "/user/me/albums",
            [],
            [],
            "user/albums"
        );

        $response = $api->user->getAlbums();

        $this->assertObjectHasAttribute("data", $response);
        foreach ($response->data as $datum) {
            $this->assertEquals("album", $datum->type);
        }
    }

    /**
     * @throws DeezerAPIException
     */
    public function testArtists()
    {
        $api = $this->setupApi(
            "GET",
            "/user/me/artists",
            [],
            [],
            "user/artists"
        );

        $response = $api->user->getArtists();

        $this->assertObjectHasAttribute("data", $response);
        foreach ($response->data as $datum) {
            $this->assertEquals("artist", $datum->type);
        }
    }

    /**
     * @throws DeezerAPIException
     */
    public function testFlow()
    {
        $api = $this->setupApi(
            "GET",
            "/user/me/flow",
            [],
            [],
            "user/flow"
        );

        $response = $api->user->getFlow();

        $this->assertObjectHasAttribute("data", $response);
        foreach ($response->data as $datum) {
            $this->assertEquals("track", $datum->type);
        }
    }

    /**
     * @throws DeezerAPIException
     */
    public function testFollowing()
    {
        $api = $this->setupApi(
            "GET",
            "/user/me/following",
            [],
            [],
            "user/following"
        );

        $response = $api->user->getFollowings();

        $this->assertObjectHasAttribute("data", $response);
        foreach ($response->data as $datum) {
            $this->assertEquals("user", $datum->type);
        }
    }


    /**
     * @throws DeezerAPIException
     */
    public function testFollowers()
    {
        $api = $this->setupApi(
            "GET",
            "/user/me/followers",
            [],
            [],
            "user/followers"
        );

        $response = $api->user->getFollowers();

        $this->assertObjectHasAttribute("data", $response);
        foreach ($response->data as $datum) {
            $this->assertEquals("user", $datum->type);
        }
    }

    /**
     * @throws DeezerAPIException
     */
    public function testOptions()
    {
        $api = $this->setupApi(
            "GET",
            "/user/me/options",
            [],
            [],
            "user/options"
        );

        $response = $api->user->getOptions();

        $this->assertObjectHasAttribute("type", $response);
        $this->assertEquals("options", $response->type);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testPermissions()
    {
        $api = $this->setupApi(
            "GET",
            "/user/me/permissions",
            [],
            [],
            "user/permissions"
        );

        $response = $api->user->getPermissions();

        $this->assertObjectHasAttribute("permissions", $response);
        $this->assertObjectHasAttribute("basic_access", $response->permissions);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testPersonalSongs()
    {
        $api = $this->setupApi(
            "GET",
            "/user/me/personal_songs",
            [],
            [],
            "user/personal_songs"
        );

        $response = $api->user->getPersonalSongs();

        $this->assertObjectHasAttribute("data", $response);
        foreach ($response->data as $datum) {
            $this->assertEquals("track", $datum->type);
        }
    }

    /**
     * @throws DeezerAPIException
     */
    public function testPlaylists()
    {
        $api = $this->setupApi(
            "GET",
            "/user/me/playlists",
            [],
            [],
            "user/playlists"
        );

        $response = $api->user->getPlaylists();

        $this->assertObjectHasAttribute("data", $response);
        foreach ($response->data as $datum) {
            $this->assertEquals("playlist", $datum->type);
        }
    }

    /**
     * @throws DeezerAPIException
     */
    public function testRecommendationsArtists()
    {
        $api = $this->setupApi(
            "GET",
            "/user/me/recommendations/artists",
            [],
            [],
            "user/recommendations_artists"
        );

        $response = $api->user->getRecommendationsArtists();

        $this->assertObjectHasAttribute("data", $response);
        foreach ($response->data as $datum) {
            $this->assertEquals("artist", $datum->type);
        }
    }

    /**
     * @throws DeezerAPIException
     */
    public function testRecommendationsAlbums()
    {
        $api = $this->setupApi(
            "GET",
            "/user/me/recommendations/albums",
            [],
            [],
            "user/recommendations_albums"
        );

        $response = $api->user->getRecommendationsAlbums();

        $this->assertObjectHasAttribute("data", $response);
        foreach ($response->data as $datum) {
            $this->assertEquals("album", $datum->type);
        }
    }

    /**
     * @throws DeezerAPIException
     */
    public function testRecommendationsReleases()
    {
        $api = $this->setupApi(
            "GET",
            "/user/me/recommendations/releases",
            [],
            [],
            "user/recommendations_releases"
        );

        $response = $api->user->getRecommendationsReleases();

        $this->assertObjectHasAttribute("data", $response);
        foreach ($response->data as $datum) {
            $this->assertEquals("album", $datum->type);
        }
    }

    /**
     * @throws DeezerAPIException
     */
    public function testRecommendationsPlaylists()
    {
        $api = $this->setupApi(
            "GET",
            "/user/me/recommendations/playlists",
            [],
            [],
            "user/recommendations_playlists"
        );

        $response = $api->user->getRecommendationsPlaylists();

        $this->assertObjectHasAttribute("data", $response);
        foreach ($response->data as $datum) {
            $this->assertEquals("playlist", $datum->type);
        }
    }

    /**
     * @throws DeezerAPIException
     */
    public function testRecommendationsRadios()
    {
        $api = $this->setupApi(
            "GET",
            "/user/me/recommendations/radios",
            [],
            [],
            "user/recommendations_radios"
        );

        $response = $api->user->getRecommendationsRadios();

        $this->assertObjectHasAttribute("data", $response);
        foreach ($response->data as $datum) {
            $this->assertEquals("radio", $datum->type);
        }
    }

    /**
     * @throws DeezerAPIException
     */
    public function testRecommendationsTracks()
    {
        $api = $this->setupApi(
            "GET",
            "/user/me/recommendations/tracks",
            [],
            [],
            "user/recommendations_tracks"
        );

        $response = $api->user->getRecommendationsTracks();

        $this->assertObjectHasAttribute("data", $response);
        foreach ($response->data as $datum) {
            $this->assertEquals("track", $datum->type);
        }
    }

    /**
     * @throws DeezerAPIException
     */
    public function testTracks()
    {
        $api = $this->setupApi(
            "GET",
            "/user/me/tracks",
            [],
            [],
            "user/tracks"
        );

        $response = $api->user->getTracks();

        $this->assertObjectHasAttribute("data", $response);
        foreach ($response->data as $datum) {
            $this->assertEquals("track", $datum->type);
        }
    }

    /**
     * @throws DeezerAPIException
     */
    public function testChartsTracks()
    {
        $api = $this->setupApi(
            "GET",
            "/user/me/charts/tracks",
            [],
            [],
            "user/charts_tracks"
        );

        $response = $api->user->getChartsTracks();

        $this->assertObjectHasAttribute("data", $response);
        foreach ($response->data as $datum) {
            $this->assertEquals("track", $datum->type);
        }
    }

    /**
     * @throws DeezerAPIException
     */
    public function testChartsArtists()
    {
        $api = $this->setupApi(
            "GET",
            "/user/me/charts/artists",
            [],
            [],
            "user/charts_artists"
        );

        $response = $api->user->getChartsArtists();

        $this->assertObjectHasAttribute("data", $response);
        foreach ($response->data as $datum) {
            $this->assertEquals("artist", $datum->type);
        }
    }

    /**
     * @throws DeezerAPIException
     */
    public function testChartsAlbums()
    {
        $api = $this->setupApi(
            "GET",
            "/user/me/charts/albums",
            [],
            [],
            "user/charts_albums"
        );

        $response = $api->user->getChartsAlbums();

        $this->assertObjectHasAttribute("data", $response);
        foreach ($response->data as $datum) {
            $this->assertEquals("album", $datum->type);
        }
    }

    /**
     * @throws DeezerAPIException
     */
    public function testChartsPlaylists()
    {
        $api = $this->setupApi(
            "GET",
            "/user/me/charts/playlists",
            [],
            [],
            "user/charts_playlists"
        );

        $response = $api->user->getChartsPlaylists();

        $this->assertObjectHasAttribute("data", $response);
        foreach ($response->data as $datum) {
            $this->assertEquals("playlist", $datum->type);
        }
    }

    /**
     * @throws DeezerAPIException
     */
    public function testHistory()
    {
        $api = $this->setupApi(
            "GET",
            "/user/me/history",
            [],
            [],
            "user/history"
        );

        $response = $api->user->getHistory();

        $this->assertObjectHasAttribute("data", $response);
        foreach ($response->data as $datum) {
            $this->assertEquals("track", $datum->type);
        }
    }

    /**
     * @throws DeezerAPIException
     */
    public function testFolders()
    {
        $api = $this->setupApi(
            "GET",
            "/user/me/folders",
            [],
            [],
            "user/folders"
        );

        $response = $api->user->getFolders();

        $this->assertObjectHasAttribute("data", $response);
        foreach ($response->data as $datum) {
            $this->assertEquals("folder", $datum->type);
        }
    }

    /**
     * @throws DeezerAPIException
     */
    public function testRadios()
    {
        $api = $this->setupApi(
            "GET",
            "/user/me/radios",
            [],
            [],
            "user/radios"
        );

        $response = $api->user->getRadios();

        $this->assertObjectHasAttribute("data", $response);
        foreach ($response->data as $datum) {
            $this->assertEquals("radio", $datum->type);
        }
    }
}
