<?php

namespace Deezer\Resources;

use Deezer\DeezerAPIException;

/**
 * Class SearchResource
 * @package Deezer\Resources
 */
class SearchResource extends AbstractResource
{
    /**
     * Search tracks
     * https://developers.deezer.com/api/search
     *
     * @param $query - Search query
     * @return array|object A list of object of type track
     * @throws DeezerAPIException
     */
    public function search($query)
    {
        $response = $this->api->sendRequest('GET', "/search", ['q' => $query]);

        return $response['body'];
    }

    /**
     * Search tracks
     * https://developers.deezer.com/api/search/tracks
     *
     * @param $query - Search query
     * @return array|object A list of object of type track
     * @throws DeezerAPIException
     */
    public function track($query)
    {
        $response = $this->api->sendRequest('GET', "/search/track", ['q' => $query]);

        return $response['body'];
    }

    /**
     * Search albums.
     * https://developers.deezer.com/api/search/album
     *
     * @param $query - Search query
     * @return array|object A list of object of type album
     * @throws DeezerAPIException
     */
    public function album($query)
    {
        $response = $this->api->sendRequest('GET', "/search/album", ['q' => $query]);

        return $response['body'];
    }

    /**
     * Search artists.
     * https://developers.deezer.com/api/search/artist
     *
     * @param $query - Search query
     * @return array|object A list of object of type artist
     * @throws DeezerAPIException
     */
    public function artist($query)
    {
        $response = $this->api->sendRequest('GET', "/search/artist", ['q' => $query]);

        return $response['body'];
    }

    /**
     * Search playlists.
     * https://developers.deezer.com/api/search/playlist
     *
     * @param $query - Search query
     * @return array|object A list of object of type playlist
     * @throws DeezerAPIException
     */
    public function playlist($query)
    {
        $response = $this->api->sendRequest('GET', "/search/playlist", ['q' => $query]);

        return $response['body'];
    }

    /**
     * Search radios.
     * https://developers.deezer.com/api/search/radio
     *
     * @param $query - Search query
     * @return array|object A list of object of type radio
     * @throws DeezerAPIException
     */
    public function radio($query)
    {
        $response = $this->api->sendRequest('GET', "/search/radio", ['q' => $query]);

        return $response['body'];
    }

    /**
     * Search users.
     * https://developers.deezer.com/api/search/user
     *
     * @param $query - Search query
     * @return array|object A list of object of type user
     * @throws DeezerAPIException
     */
    public function user($query)
    {
        $response = $this->api->sendRequest('GET', "/search/user", ['q' => $query]);

        return $response['body'];
    }

    /**
     * Get user search history.
     * https://developers.deezer.com/api/search/history
     *
     * @param $query - Search query
     * @return array|object A list of object of type track, album, artist, playlist, podcast, radio
     * @throws DeezerAPIException
     */
    public function history($query)
    {
        $response = $this->api->sendRequest('GET', "/search/history", ['q' => $query]);

        return $response['body'];
    }
}
