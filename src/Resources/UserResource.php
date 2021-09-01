<?php

namespace Deezer\Resources;

use Deezer\DeezerAPIException;

/**
 * Class UserResource
 * @package Deezer\Resources
 */
class UserResource extends AbstractResource
{
    /**
     * A user object
     * https://developers.deezer.com/api/user
     *
     * @param int $id - The user's Deezer id
     * @return array|object A list of object of type user
     * @throws DeezerAPIException
     */
    public function get(int $id)
    {
        $response = $this->api->sendRequest('GET', "/user/$id");

        return $response['body'];
    }

    /**
     * A user object
     * https://developers.deezer.com/api/user
     *
     * @return array|object A list of object of type user
     * @throws DeezerAPIException
     */
    public function me()
    {
        $response = $this->api->sendRequest('GET', "/user/me");

        return $response['body'];
    }

    /**
     * Return a list of user's favorite albums. Represented by an array of Album object
     * https://developers.deezer.com/api/user/albums
     *
     * @return array|object A list of object of type album
     * @throws DeezerAPIException
     */
    public function getAlbums()
    {
        $response = $this->api->sendRequest('GET', "/user/me/albums");

        return $response['body'];
    }

    /**
     * Return a list of user's favorite artists. Represented by an array of Artist object
     * https://developers.deezer.com/api/user/artists
     *
     * @return array|object A list of object of type album
     * @throws DeezerAPIException
     */
    public function getArtists()
    {
        $response = $this->api->sendRequest('GET', "/user/me/artists");

        return $response['body'];
    }

    /**
     * Returns a list of user's flow tracks, represented by an array of Track object.
     * https://developers.deezer.com/api/user/flow
     *
     * @return array|object A list of object of type track
     * @throws DeezerAPIException
     */
    public function getFlow()
    {
        $response = $this->api->sendRequest('GET', "/user/me/flow");

        return $response['body'];
    }

    /**
     * Return a list of user's Folder.
     * https://developers.deezer.com/api/user/folders
     *
     * @return array|object A list of object of type folder
     * @throws DeezerAPIException
     */
    public function getFolders()
    {
        $response = $this->api->sendRequest('GET', "/user/me/folders");

        return $response['body'];
    }

    /**
     * Return a list of user's Friends, represented by an array of User object
     * https://developers.deezer.com/api/user/folders
     *
     * @return array|object A list of object of type user
     * @throws DeezerAPIException
     */
    public function getFollowings()
    {
        $response = $this->api->sendRequest('GET', "/user/me/following");

        return $response['body'];
    }

    /**
     * Return a list of user's Friends, represented by an array of User object
     * https://developers.deezer.com/api/user/folders
     *
     * @return array|object A list of object of type user
     * @throws DeezerAPIException
     */
    public function getFollowers()
    {
        $response = $this->api->sendRequest('GET', "/user/me/followers");

        return $response['body'];
    }

    /**
     * Returns a list of the recently played tracks
     * https://developers.deezer.com/api/user/folders
     *
     * @return array|object A list of object of type track
     * @throws DeezerAPIException
     */
    public function getHistory()
    {
        $response = $this->api->sendRequest('GET', "/user/me/history");

        return $response['body'];
    }

    /**
     * Return the user's Permissions granted to the application
     * https://developers.deezer.com/api/user/folders
     *
     * @return array|object An object of type variable
     * @throws DeezerAPIException
     */
    public function getPermissions()
    {
        $response = $this->api->sendRequest('GET', "/user/me/permissions");

        return $response['body'];
    }

    /**
     * Get the user's options
     * Alias of /options
     * https://developers.deezer.com/api/user/options
     *
     * @return array|object An object of type options
     * @throws DeezerAPIException
     */
    public function getOptions()
    {
        $response = $this->api->sendRequest('GET', "/user/me/options");

        return $response['body'];
    }

    /**
     * Return a list of user's personal song, represented by an array of Tracks
     * https://developers.deezer.com/api/user/personal_songs
     *
     * @return array|object A list of object of type track
     * @throws DeezerAPIException
     */
    public function getPersonalSongs()
    {
        $response = $this->api->sendRequest('GET', "/user/me/personal_songs");

        return $response['body'];
    }

    /**
     * Return a list of user's public Playlist, represented by an array of Playlist object.
     * Permission is needed to return private playlists
     * https://developers.deezer.com/api/user/playslists
     *
     * @return array|object A list of object of type playlist
     * @throws DeezerAPIException
     */
    public function getPlaylists()
    {
        $response = $this->api->sendRequest('GET', "/user/me/playlists");

        return $response['body'];
    }

    /**
     * Return a list of user's favorite Radios, represented by an array of Radio object.
     * https://developers.deezer.com/api/user/radios
     *
     * @return array|object A list of object of type radio
     * @throws DeezerAPIException
     */
    public function getRadios()
    {
        $response = $this->api->sendRequest('GET', "/user/me/radios");

        return $response['body'];
    }

    /**
     * Return a list of user's favorite tracks. Represented by an array of Track object.
     * https://developers.deezer.com/api/user/tracks
     *
     * @return array|object A list of object of type track
     * @throws DeezerAPIException
     */
    public function getTracks()
    {
        $response = $this->api->sendRequest('GET', "/user/me/tracks");

        return $response['body'];
    }

    /**
     * Return a list of albums recommendations represented by an array of Album objects.
     * https://developers.deezer.com/api/user/recommendations/albums
     *
     * @return array|object A list of object of type album
     * @throws DeezerAPIException
     */
    public function getRecommendationsAlbums()
    {
        $response = $this->api->sendRequest('GET', "/user/me/recommendations/albums");

        return $response['body'];
    }

    /**
     * Return a list of albums recommendations represented by an array of Album objects.
     * https://developers.deezer.com/api/user/recommendations/releases
     *
     * @return array|object A list of object of type album
     * @throws DeezerAPIException
     */
    public function getRecommendationsReleases()
    {
        $response = $this->api->sendRequest('GET', "/user/me/recommendations/releases");

        return $response['body'];
    }

    /**
     * Return a list of artists recommendations represented by an array of Artist objects.
     * https://developers.deezer.com/api/user/recommendations/artists
     *
     * @return array|object A list of object of type artist
     * @throws DeezerAPIException
     */
    public function getRecommendationsArtists()
    {
        $response = $this->api->sendRequest('GET', "/user/me/recommendations/artists");

        return $response['body'];
    }

    /**
     * Return a list of playlists recommendations represented by an array of Playlist objects.
     * https://developers.deezer.com/api/user/recommendations/playlists
     *
     * @return array|object A list of object of type playlist
     * @throws DeezerAPIException
     */
    public function getRecommendationsPlaylists()
    {
        $response = $this->api->sendRequest('GET', "/user/me/recommendations/playlists");

        return $response['body'];
    }

    /**
     * Return a list of tracks recommendations represented by an array of Track objects.
     * https://developers.deezer.com/api/user/recommendations/tracks
     *
     * @return array|object A list of object of type track
     * @throws DeezerAPIException
     */
    public function getRecommendationsTracks()
    {
        $response = $this->api->sendRequest('GET', "/user/me/recommendations/tracks");

        return $response['body'];
    }

    /**
     * Return a list of radios recommendations represented by an array of Radio objects.
     * https://developers.deezer.com/api/user/recommendations/radios
     *
     * @return array|object A list of object of type radio
     * @throws DeezerAPIException
     */
    public function getRecommendationsRadios()
    {
        $response = $this->api->sendRequest('GET', "/user/me/recommendations/radios");

        return $response['body'];
    }

    /**
     * Returns a list of the user's top 25 tracks. Represented by an array of Track object
     * https://developers.deezer.com/api/user/charts/tracks
     *
     * @return array|object A list of object of type track
     * @throws DeezerAPIException
     */
    public function getChartsTracks()
    {
        $response = $this->api->sendRequest('GET', "/user/me/charts/tracks");

        return $response['body'];
    }

    /**
     * Returns a list of the user's top albums represented by an array of Album objects.
     * https://developers.deezer.com/api/user/charts/albums
     *
     * @return array|object A list of object of type album
     * @throws DeezerAPIException
     */
    public function getChartsAlbums()
    {
        $response = $this->api->sendRequest('GET', "/user/me/charts/albums");

        return $response['body'];
    }

    /**
     * Returns a list of the user's top playlists, represented by an array of Playlist objects.
     * https://developers.deezer.com/api/user/charts/playlists
     *
     * @return array|object A list of object of type playlist
     * @throws DeezerAPIException
     */
    public function getChartsPlaylists()
    {
        $response = $this->api->sendRequest('GET', "/user/me/charts/playlists");

        return $response['body'];
    }

    /**
     * Returns a list of the user's top artists, represented by an array of Artists objects.
     * https://developers.deezer.com/api/user/charts/artists
     *
     * @return array|object A list of object of type artis
     * @throws DeezerAPIException
     */
    public function getChartsArtists()
    {
        $response = $this->api->sendRequest('GET', "/user/me/charts/artists");

        return $response['body'];
    }
}
