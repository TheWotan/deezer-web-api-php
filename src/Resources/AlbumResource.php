<?php

namespace Deezer\Resources;

use Deezer\DeezerAPIException;

/**
 * Class AlbumResource
 * @package Deezer\Resources
 */
class AlbumResource extends AbstractResource
{
    /**
     * Get An album object
     * https://developers.deezer.com/api/album
     *
     * @param $id - The album's Deezer id
     * @return array|object An artist object
     * @throws DeezerAPIException
     */
    public function get($id)
    {
        $response = $this->api->sendRequest('GET', "/album/{$id}");

        return $response['body'];
    }

    /**
     * Return a list of album's fans. Represented by an array of User objects
     * https://developers.deezer.com/api/album/fans
     *
     * @param $id - The album's Deezer id
     * @return array|object A list of object of type user
     * @throws DeezerAPIException
     */
    public function getFans($id)
    {
        $response = $this->api->sendRequest('GET', "/album/{$id}/fans");

        return $response['body'];
    }

    /**
     * Return a list of album's tracks. Represented by an array of Track objects
     * https://developers.deezer.com/api/album/tracks
     *
     * @param $id - The album's Deezer id
     * @return array|object A list of object of type tracks
     * @throws DeezerAPIException
     */
    public function getTracks($id)
    {
        $response = $this->api->sendRequest('GET', "/album/{$id}/tracks");

        return $response['body'];
    }
}
