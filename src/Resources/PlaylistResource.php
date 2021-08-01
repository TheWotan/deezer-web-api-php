<?php

namespace Deezer\Resources;

use Deezer\DeezerAPIException;

/**
 * Class PlaylistResource
 * @package Deezer\Resources
 */
class PlaylistResource extends AbstractResource
{
    /**
     * Get An playlist object
     * https://developers.deezer.com/api/playlist
     *
     * @param int $id - The playlist deezer ID
     * @return array|object An playlist object
     * @throws DeezerAPIException
     */
    public function get(int $id)
    {
        $response = $this->api->sendRequest('GET', "/playlist/$id");

        return $response['body'];
    }

    /**
     * Return a list of playlist's fans. Represented by an array of User objects
     * https://developers.deezer.com/api/playlist/fans
     *
     * @param int $id - The playlist deezer ID
     * @return array|object A list of object of type user
     * @throws DeezerAPIException
     */
    public function getFans(int $id)
    {
        $response = $this->api->sendRequest('GET', "/playlist/$id/fans");

        return $response['body'];
    }

    /**
     * Return a list of playlist's tracks. Represented by an array of Track object
     * https://developers.deezer.com/api/playlist/tracks
     *
     * @param int $id - The playlist deezer ID
     * @return array|object A list of object of type track
     * @throws DeezerAPIException
     */
    public function getTracks(int $id)
    {
        $response = $this->api->sendRequest('GET', "/playlist/$id/tracks");

        return $response['body'];
    }

    /**
     * Return a list of playlist's recommendation tracks. Represented by an array of Track object
     * https://developers.deezer.com/api/playlist/tracks
     *
     * @param int $id - The playlist deezer ID
     * @return array|object A list of object of type track
     * @throws DeezerAPIException
     */
    public function getRadio(int $id)
    {
        $response = $this->api->sendRequest('GET', "/playlist/$id/radio");

        return $response['body'];
    }
}
