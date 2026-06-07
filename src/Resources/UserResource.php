<?php

namespace Deezer\Resources;

use Deezer\DeezerAPIException;
use Deezer\Resources\Interfaces\UserResourceInterface;

/**
 * Class UserResource
 * @package Deezer\Resources
 */
class UserResource extends AbstractResource implements UserResourceInterface
{
    /**
     * A user object
     * https://developers.deezer.com/api/user
     *
     * @auth none
     * @param int $id - The user's Deezer id
     * @return object{
     *   id: int, name: string, lastname: string, firstname: string,
     *   email: string, status: int, birthday: string,
     *   inscription_date: string, gender: string, link: string,
     *   picture: string, picture_small: string, picture_medium: string,
     *   picture_big: string, picture_xl: string,
     *   lang: string, is_kid: bool, explicit_content_level: string,
     *   explicit_content_levels_available: string[],
     *   tracklist: string, type: string
     * }
     * @throws DeezerAPIException
     */
    public function get(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/user/$id");

        return $response['body'];
    }

    /**
     * A user object
     * https://developers.deezer.com/api/user
     *
     * @auth required
     * @return object{
     *   id: int, name: string, lastname: string, firstname: string,
     *   email: string, status: int, birthday: string,
     *   inscription_date: string, gender: string, link: string,
     *   picture: string, picture_small: string, picture_medium: string,
     *   picture_big: string, picture_xl: string,
     *   lang: string, is_kid: bool, explicit_content_level: string,
     *   explicit_content_levels_available: string[],
     *   tracklist: string, type: string
     * }
     * @throws DeezerAPIException
     */
    public function me(): object
    {
        $response = $this->api->sendRequest('GET', "/user/me");

        return $response['body'];
    }

    /**
     * Return a list of user's favorite albums. Represented by an array of Album object
     * https://developers.deezer.com/api/user/albums
     *
     * @auth required
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getAlbums(): object
    {
        $response = $this->api->sendRequest('GET', "/user/me/albums");

        return $response['body'];
    }

    /**
     * Return a list of user's favorite artists. Represented by an array of Artist object
     * https://developers.deezer.com/api/user/artists
     *
     * @auth required
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getArtists(): object
    {
        $response = $this->api->sendRequest('GET', "/user/me/artists");

        return $response['body'];
    }

    /**
     * Returns a list of user's flow tracks, represented by an array of Track object.
     * https://developers.deezer.com/api/user/flow
     *
     * @auth required
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getFlow(): object
    {
        $response = $this->api->sendRequest('GET', "/user/me/flow");

        return $response['body'];
    }

    /**
     * Return a list of user's Folder.
     * https://developers.deezer.com/api/user/folders
     *
     * @auth required
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getFolders(): object
    {
        $response = $this->api->sendRequest('GET', "/user/me/folders");

        return $response['body'];
    }

    /**
     * Return a list of user's Friends, represented by an array of User object
     * https://developers.deezer.com/api/user/folders
     *
     * @auth required
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getFollowings(): object
    {
        $response = $this->api->sendRequest('GET', "/user/me/following");

        return $response['body'];
    }

    /**
     * Return a list of user's Friends, represented by an array of User object
     * https://developers.deezer.com/api/user/folders
     *
     * @auth required
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getFollowers(): object
    {
        $response = $this->api->sendRequest('GET', "/user/me/followers");

        return $response['body'];
    }

    /**
     * Returns a list of the recently played tracks
     * https://developers.deezer.com/api/user/folders
     *
     * @auth required
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getHistory(): object
    {
        $response = $this->api->sendRequest('GET', "/user/me/history");

        return $response['body'];
    }

    /**
     * Return the user's Permissions granted to the application
     * https://developers.deezer.com/api/user/folders
     *
     * @auth required
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getPermissions(): object
    {
        $response = $this->api->sendRequest('GET', "/user/me/permissions");

        return $response['body'];
    }

    /**
     * Get the user's options
     * Alias of /options
     * https://developers.deezer.com/api/user/options
     *
     * @auth required
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getOptions(): object
    {
        $response = $this->api->sendRequest('GET', "/user/me/options");

        return $response['body'];
    }

    /**
     * Return a list of user's personal song, represented by an array of Tracks
     * https://developers.deezer.com/api/user/personal_songs
     *
     * @auth required
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getPersonalSongs(): object
    {
        $response = $this->api->sendRequest('GET', "/user/me/personal_songs");

        return $response['body'];
    }

    /**
     * Return a list of user's public Playlist, represented by an array of Playlist object.
     * Permission is needed to return private playlists
     * https://developers.deezer.com/api/user/playslists
     *
     * @auth required
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getPlaylists(): object
    {
        $response = $this->api->sendRequest('GET', "/user/me/playlists");

        return $response['body'];
    }

    /**
     * Return a list of user's favorite Radios, represented by an array of Radio object.
     * https://developers.deezer.com/api/user/radios
     *
     * @auth required
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getRadios(): object
    {
        $response = $this->api->sendRequest('GET', "/user/me/radios");

        return $response['body'];
    }

    /**
     * Return a list of user's favorite tracks. Represented by an array of Track object.
     * https://developers.deezer.com/api/user/tracks
     *
     * @auth required
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getTracks(): object
    {
        $response = $this->api->sendRequest('GET', "/user/me/tracks");

        return $response['body'];
    }

    /**
     * Return a list of albums recommendations represented by an array of Album objects.
     * https://developers.deezer.com/api/user/recommendations/albums
     *
     * @auth required
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getRecommendationsAlbums(): object
    {
        $response = $this->api->sendRequest('GET', "/user/me/recommendations/albums");

        return $response['body'];
    }

    /**
     * Return a list of albums recommendations represented by an array of Album objects.
     * https://developers.deezer.com/api/user/recommendations/releases
     *
     * @auth required
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getRecommendationsReleases(): object
    {
        $response = $this->api->sendRequest('GET', "/user/me/recommendations/releases");

        return $response['body'];
    }

    /**
     * Return a list of artists recommendations represented by an array of Artist objects.
     * https://developers.deezer.com/api/user/recommendations/artists
     *
     * @auth required
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getRecommendationsArtists(): object
    {
        $response = $this->api->sendRequest('GET', "/user/me/recommendations/artists");

        return $response['body'];
    }

    /**
     * Return a list of playlists recommendations represented by an array of Playlist objects.
     * https://developers.deezer.com/api/user/recommendations/playlists
     *
     * @auth required
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getRecommendationsPlaylists(): object
    {
        $response = $this->api->sendRequest('GET', "/user/me/recommendations/playlists");

        return $response['body'];
    }

    /**
     * Return a list of tracks recommendations represented by an array of Track objects.
     * https://developers.deezer.com/api/user/recommendations/tracks
     *
     * @auth required
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getRecommendationsTracks(): object
    {
        $response = $this->api->sendRequest('GET', "/user/me/recommendations/tracks");

        return $response['body'];
    }

    /**
     * Return a list of radios recommendations represented by an array of Radio objects.
     * https://developers.deezer.com/api/user/recommendations/radios
     *
     * @auth required
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getRecommendationsRadios(): object
    {
        $response = $this->api->sendRequest('GET', "/user/me/recommendations/radios");

        return $response['body'];
    }

    /**
     * Returns a list of the user's top 25 tracks. Represented by an array of Track object
     * https://developers.deezer.com/api/user/charts/tracks
     *
     * @auth required
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getChartsTracks(): object
    {
        $response = $this->api->sendRequest('GET', "/user/me/charts/tracks");

        return $response['body'];
    }

    /**
     * Returns a list of the user's top albums represented by an array of Album objects.
     * https://developers.deezer.com/api/user/charts/albums
     *
     * @auth required
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getChartsAlbums(): object
    {
        $response = $this->api->sendRequest('GET', "/user/me/charts/albums");

        return $response['body'];
    }

    /**
     * Returns a list of the user's top playlists, represented by an array of Playlist objects.
     * https://developers.deezer.com/api/user/charts/playlists
     *
     * @auth required
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getChartsPlaylists(): object
    {
        $response = $this->api->sendRequest('GET', "/user/me/charts/playlists");

        return $response['body'];
    }

    /**
     * Returns a list of the user's top artists, represented by an array of Artists objects.
     * https://developers.deezer.com/api/user/charts/artists
     *
     * @auth required
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getChartsArtists(): object
    {
        $response = $this->api->sendRequest('GET', "/user/me/charts/artists");

        return $response['body'];
    }

    /**
     * Return a list of a user's favorite albums by user ID
     * https://developers.deezer.com/api/user/albums
     *
     * @auth none
     * @param int $id - The user's Deezer id
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getAlbumsById(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/user/$id/albums");

        return $response['body'];
    }

    /**
     * Return a list of a user's favorite artists by user ID
     * https://developers.deezer.com/api/user/artists
     *
     * @auth none
     * @param int $id - The user's Deezer id
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getArtistsById(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/user/$id/artists");

        return $response['body'];
    }

    /**
     * Return a list of a user's followings by user ID
     * https://developers.deezer.com/api/user/following
     *
     * @auth none
     * @param int $id - The user's Deezer id
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getFollowingsById(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/user/$id/following");

        return $response['body'];
    }

    /**
     * Return a list of a user's followers by user ID
     * https://developers.deezer.com/api/user/followers
     *
     * @auth none
     * @param int $id - The user's Deezer id
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getFollowersById(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/user/$id/followers");

        return $response['body'];
    }

    /**
     * Return a list of a user's playlists by user ID
     * https://developers.deezer.com/api/user/playlists
     *
     * @auth none
     * @param int $id - The user's Deezer id
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getPlaylistsById(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/user/$id/playlists");

        return $response['body'];
    }

    /**
     * Add an album to the user's library
     * https://developers.deezer.com/api/user/albums
     *
     * @auth required
     * @param int $albumId - The album's Deezer id
     * @return bool
     * @throws DeezerAPIException
     */
    public function addAlbum(int $albumId): bool
    {
        $response = $this->api->sendRequest('POST', "/user/me/albums", ['album_id' => $albumId]);

        return (bool) $response['body'];
    }

    /**
     * Remove an album from the user's library
     * https://developers.deezer.com/api/user/albums
     *
     * @auth required
     * @param int $albumId - The album's Deezer id
     * @return bool
     * @throws DeezerAPIException
     */
    public function removeAlbum(int $albumId): bool
    {
        $response = $this->api->sendRequest('DELETE', "/user/me/albums", ['album_id' => $albumId]);

        return (bool) $response['body'];
    }

    /**
     * Follow an artist
     * https://developers.deezer.com/api/user/artists
     *
     * @auth required
     * @param int $artistId - The artist's Deezer id
     * @return bool
     * @throws DeezerAPIException
     */
    public function followArtist(int $artistId): bool
    {
        $response = $this->api->sendRequest('POST', "/user/me/artists", ['artist_id' => $artistId]);

        return (bool) $response['body'];
    }

    /**
     * Unfollow an artist
     * https://developers.deezer.com/api/user/artists
     *
     * @auth required
     * @param int $artistId - The artist's Deezer id
     * @return bool
     * @throws DeezerAPIException
     */
    public function unfollowArtist(int $artistId): bool
    {
        $response = $this->api->sendRequest('DELETE', "/user/me/artists", ['artist_id' => $artistId]);

        return (bool) $response['body'];
    }

    /**
     * Follow a user
     * https://developers.deezer.com/api/user/following
     *
     * @auth required
     * @param int $userId - The user's Deezer id to follow
     * @return bool
     * @throws DeezerAPIException
     */
    public function followUser(int $userId): bool
    {
        $response = $this->api->sendRequest('POST', "/user/me/following", ['user_id' => $userId]);

        return (bool) $response['body'];
    }

    /**
     * Unfollow a user
     * https://developers.deezer.com/api/user/following
     *
     * @auth required
     * @param int $userId - The user's Deezer id to unfollow
     * @return bool
     * @throws DeezerAPIException
     */
    public function unfollowUser(int $userId): bool
    {
        $response = $this->api->sendRequest('DELETE', "/user/me/following", ['user_id' => $userId]);

        return (bool) $response['body'];
    }

    /**
     * Add a track to the user's library
     * https://developers.deezer.com/api/user/tracks
     *
     * @auth required
     * @param int $trackId - The track's Deezer id
     * @return bool
     * @throws DeezerAPIException
     */
    public function addTrack(int $trackId): bool
    {
        $response = $this->api->sendRequest('POST', "/user/me/tracks", ['track_id' => $trackId]);

        return (bool) $response['body'];
    }

    /**
     * Remove a track from the user's library
     * https://developers.deezer.com/api/user/tracks
     *
     * @auth required
     * @param int $trackId - The track's Deezer id
     * @return bool
     * @throws DeezerAPIException
     */
    public function removeTrack(int $trackId): bool
    {
        $response = $this->api->sendRequest('DELETE', "/user/me/tracks", ['track_id' => $trackId]);

        return (bool) $response['body'];
    }

    /**
     * Add a radio to the user's library
     * https://developers.deezer.com/api/user/radios
     *
     * @auth required
     * @param int $radioId - The radio's Deezer id
     * @return bool
     * @throws DeezerAPIException
     */
    public function addRadio(int $radioId): bool
    {
        $response = $this->api->sendRequest('POST', "/user/me/radios", ['radio_id' => $radioId]);

        return (bool) $response['body'];
    }

    /**
     * Remove a radio from the user's library
     * https://developers.deezer.com/api/user/radios
     *
     * @auth required
     * @param int $radioId - The radio's Deezer id
     * @return bool
     * @throws DeezerAPIException
     */
    public function removeRadio(int $radioId): bool
    {
        $response = $this->api->sendRequest('DELETE', "/user/me/radios", ['radio_id' => $radioId]);

        return (bool) $response['body'];
    }

    /**
     * Create a playlist for the current user
     * https://developers.deezer.com/api/user/playlists
     *
     * @auth required
     * @param string $title - The playlist title
     * @return object{id: int}
     * @throws DeezerAPIException
     */
    public function createPlaylist(string $title): object
    {
        $response = $this->api->sendRequest('POST', "/user/me/playlists", ['title' => $title]);

        return $response['body'];
    }
}
