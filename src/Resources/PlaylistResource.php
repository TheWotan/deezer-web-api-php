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
     * @param $id - The playlist deezer ID
     * @return array|object An playlist object
     * @throws DeezerAPIException
     */
    public function get($id)
    {
        $response = $this->api->sendRequest('GET', "/playlist/{$id}");

        return $response['body'];
    }

    /**
     * Return a list of playlist's fans. Represented by an array of User objects
     * https://developers.deezer.com/api/playlist/fans
     *
     * @param $id - The playlist deezer ID
     * @return array|object A list of object of type user
     * @throws DeezerAPIException
     */
    public function getFans($id)
    {
        $response = $this->api->sendRequest('GET', "/playlist/{$id}/fans");

        return $response['body'];
    }

    /**
     * Return a list of playlist's tracks. Represented by an array of Track object
     * https://developers.deezer.com/api/playlist/tracks
     *
     * @param $id - The playlist deezer ID
     * @return array|object A list of object of type track
     * @throws DeezerAPIException
     */
    public function getTracks($id)
    {
        $response = $this->api->sendRequest('GET', "/playlist/{$id}/tracks");

        return $response['body'];
    }

    /**
     * Return a list of playlist's recommendation tracks. Represented by an array of Track object
     * https://developers.deezer.com/api/playlist/tracks
     *
     * @param $id - The playlist deezer ID
     * @return array|object A list of object of type track
     * @throws DeezerAPIException
     */
    public function getRadio($id)
    {
        $response = $this->api->sendRequest('GET', "/playlist/{$id}/radio");

        return $response['body'];
    }
}
