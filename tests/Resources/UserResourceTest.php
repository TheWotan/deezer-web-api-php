<?php

declare(strict_types=1);

use Deezer\DeezerAPI;
use Deezer\DeezerAPIException;
use Deezer\Request;

require_once __DIR__ . "/AbstractResourceTest.php";

class UserResourceTest extends AbstractResourceTest
{
    private const ID = 3110477044;

    /**
     * @throws DeezerAPIException
     * @group real-api
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

        $this->assertObjectHasProperty("id", $response);
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

        $this->assertObjectHasProperty("id", $response);
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

        $this->assertObjectHasProperty("data", $response);
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

        $this->assertObjectHasProperty("data", $response);
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

        $this->assertObjectHasProperty("data", $response);
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

        $this->assertObjectHasProperty("data", $response);
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

        $this->assertObjectHasProperty("data", $response);
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

        $this->assertObjectHasProperty("type", $response);
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

        $this->assertObjectHasProperty("permissions", $response);
        $this->assertObjectHasProperty("basic_access", $response->permissions);
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

        $this->assertObjectHasProperty("data", $response);
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

        $this->assertObjectHasProperty("data", $response);
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

        $this->assertObjectHasProperty("data", $response);
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

        $this->assertObjectHasProperty("data", $response);
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

        $this->assertObjectHasProperty("data", $response);
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

        $this->assertObjectHasProperty("data", $response);
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

        $this->assertObjectHasProperty("data", $response);
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

        $this->assertObjectHasProperty("data", $response);
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

        $this->assertObjectHasProperty("data", $response);
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

        $this->assertObjectHasProperty("data", $response);
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

        $this->assertObjectHasProperty("data", $response);
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

        $this->assertObjectHasProperty("data", $response);
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

        $this->assertObjectHasProperty("data", $response);
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

        $this->assertObjectHasProperty("data", $response);
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

        $this->assertObjectHasProperty("data", $response);
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

        $this->assertObjectHasProperty("data", $response);
        foreach ($response->data as $datum) {
            $this->assertEquals("radio", $datum->type);
        }
    }

    public function testGetAlbumsById(): void
    {
        $stub = $this->createPartialMock(Request::class, ['send', 'getLastResponse']);
        $return = ['body' => json_decode(file_get_contents('tests/fixtures/user/albums.json'))];
        $stub->method('send')
            ->with('GET', Request::API_URL . '/user/12345/albums', [], [])
            ->willReturn($return);
        $stub->method('getLastResponse')->willReturn($return);
        $api = new DeezerAPI([], null, $stub);

        $result = $api->user->getAlbumsById(12345);
        $this->assertObjectHasProperty('data', $result);
    }

    public function testGetArtistsById(): void
    {
        $stub = $this->createPartialMock(Request::class, ['send', 'getLastResponse']);
        $return = ['body' => json_decode(file_get_contents('tests/fixtures/user/artists.json'))];
        $stub->method('send')
            ->with('GET', Request::API_URL . '/user/12345/artists', [], [])
            ->willReturn($return);
        $stub->method('getLastResponse')->willReturn($return);
        $api = new DeezerAPI([], null, $stub);

        $result = $api->user->getArtistsById(12345);
        $this->assertObjectHasProperty('data', $result);
    }

    public function testGetFollowersById(): void
    {
        $stub = $this->createPartialMock(Request::class, ['send', 'getLastResponse']);
        $return = ['body' => json_decode(file_get_contents('tests/fixtures/user/followers.json'))];
        $stub->method('send')
            ->with('GET', Request::API_URL . '/user/12345/followers', [], [])
            ->willReturn($return);
        $stub->method('getLastResponse')->willReturn($return);
        $api = new DeezerAPI([], null, $stub);

        $result = $api->user->getFollowersById(12345);
        $this->assertObjectHasProperty('data', $result);
    }

    public function testGetFollowingsById(): void
    {
        $stub = $this->createPartialMock(Request::class, ['send', 'getLastResponse']);
        $return = ['body' => json_decode(file_get_contents('tests/fixtures/user/following.json'))];
        $stub->method('send')
            ->with('GET', Request::API_URL . '/user/12345/following', [], [])
            ->willReturn($return);
        $stub->method('getLastResponse')->willReturn($return);
        $api = new DeezerAPI([], null, $stub);

        $result = $api->user->getFollowingsById(12345);
        $this->assertObjectHasProperty('data', $result);
    }

    public function testGetPlaylistsById(): void
    {
        $stub = $this->createPartialMock(Request::class, ['send', 'getLastResponse']);
        $return = ['body' => json_decode(file_get_contents('tests/fixtures/user/playlists.json'))];
        $stub->method('send')
            ->with('GET', Request::API_URL . '/user/12345/playlists', [], [])
            ->willReturn($return);
        $stub->method('getLastResponse')->willReturn($return);
        $api = new DeezerAPI([], null, $stub);

        $result = $api->user->getPlaylistsById(12345);
        $this->assertObjectHasProperty('data', $result);
    }

    public function testAddAlbum(): void
    {
        $stub = $this->createPartialMock(Request::class, ['send', 'getLastResponse']);
        $return = ['body' => true];
        $stub->method('send')
            ->with('POST', Request::API_URL . '/user/me/albums', ['album_id' => 302127], [])
            ->willReturn($return);
        $stub->method('getLastResponse')->willReturn($return);
        $api = new DeezerAPI([], null, $stub);
        $this->assertTrue($api->user->addAlbum(302127));
    }

    public function testRemoveAlbum(): void
    {
        $stub = $this->createPartialMock(Request::class, ['send', 'getLastResponse']);
        $return = ['body' => true];
        $stub->method('send')
            ->with('DELETE', Request::API_URL . '/user/me/albums', ['album_id' => 302127], [])
            ->willReturn($return);
        $stub->method('getLastResponse')->willReturn($return);
        $api = new DeezerAPI([], null, $stub);
        $this->assertTrue($api->user->removeAlbum(302127));
    }

    public function testFollowArtist(): void
    {
        $stub = $this->createPartialMock(Request::class, ['send', 'getLastResponse']);
        $return = ['body' => true];
        $stub->method('send')
            ->with('POST', Request::API_URL . '/user/me/artists', ['artist_id' => 27], [])
            ->willReturn($return);
        $stub->method('getLastResponse')->willReturn($return);
        $api = new DeezerAPI([], null, $stub);
        $this->assertTrue($api->user->followArtist(27));
    }

    public function testUnfollowArtist(): void
    {
        $stub = $this->createPartialMock(Request::class, ['send', 'getLastResponse']);
        $return = ['body' => true];
        $stub->method('send')
            ->with('DELETE', Request::API_URL . '/user/me/artists', ['artist_id' => 27], [])
            ->willReturn($return);
        $stub->method('getLastResponse')->willReturn($return);
        $api = new DeezerAPI([], null, $stub);
        $this->assertTrue($api->user->unfollowArtist(27));
    }

    public function testFollowUser(): void
    {
        $stub = $this->createPartialMock(Request::class, ['send', 'getLastResponse']);
        $return = ['body' => true];
        $stub->method('send')
            ->with('POST', Request::API_URL . '/user/me/following', ['user_id' => 5], [])
            ->willReturn($return);
        $stub->method('getLastResponse')->willReturn($return);
        $api = new DeezerAPI([], null, $stub);
        $this->assertTrue($api->user->followUser(5));
    }

    public function testUnfollowUser(): void
    {
        $stub = $this->createPartialMock(Request::class, ['send', 'getLastResponse']);
        $return = ['body' => true];
        $stub->method('send')
            ->with('DELETE', Request::API_URL . '/user/me/following', ['user_id' => 5], [])
            ->willReturn($return);
        $stub->method('getLastResponse')->willReturn($return);
        $api = new DeezerAPI([], null, $stub);
        $this->assertTrue($api->user->unfollowUser(5));
    }

    public function testAddTrack(): void
    {
        $stub = $this->createPartialMock(Request::class, ['send', 'getLastResponse']);
        $return = ['body' => true];
        $stub->method('send')
            ->with('POST', Request::API_URL . '/user/me/tracks', ['track_id' => 3135556], [])
            ->willReturn($return);
        $stub->method('getLastResponse')->willReturn($return);
        $api = new DeezerAPI([], null, $stub);
        $this->assertTrue($api->user->addTrack(3135556));
    }

    public function testRemoveTrack(): void
    {
        $stub = $this->createPartialMock(Request::class, ['send', 'getLastResponse']);
        $return = ['body' => true];
        $stub->method('send')
            ->with('DELETE', Request::API_URL . '/user/me/tracks', ['track_id' => 3135556], [])
            ->willReturn($return);
        $stub->method('getLastResponse')->willReturn($return);
        $api = new DeezerAPI([], null, $stub);
        $this->assertTrue($api->user->removeTrack(3135556));
    }

    public function testAddRadio(): void
    {
        $stub = $this->createPartialMock(Request::class, ['send', 'getLastResponse']);
        $return = ['body' => true];
        $stub->method('send')
            ->with('POST', Request::API_URL . '/user/me/radios', ['radio_id' => 23], [])
            ->willReturn($return);
        $stub->method('getLastResponse')->willReturn($return);
        $api = new DeezerAPI([], null, $stub);
        $this->assertTrue($api->user->addRadio(23));
    }

    public function testRemoveRadio(): void
    {
        $stub = $this->createPartialMock(Request::class, ['send', 'getLastResponse']);
        $return = ['body' => true];
        $stub->method('send')
            ->with('DELETE', Request::API_URL . '/user/me/radios', ['radio_id' => 23], [])
            ->willReturn($return);
        $stub->method('getLastResponse')->willReturn($return);
        $api = new DeezerAPI([], null, $stub);
        $this->assertTrue($api->user->removeRadio(23));
    }

    public function testCreatePlaylist(): void
    {
        $stub = $this->createPartialMock(Request::class, ['send', 'getLastResponse']);
        $return = ['body' => json_decode('{"id": 999}')];
        $stub->method('send')
            ->with('POST', Request::API_URL . '/user/me/playlists', ['title' => 'My List'], [])
            ->willReturn($return);
        $stub->method('getLastResponse')->willReturn($return);
        $api = new DeezerAPI([], null, $stub);

        $result = $api->user->createPlaylist('My List');
        $this->assertSame(999, $result->id);
    }
}
