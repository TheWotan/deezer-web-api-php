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
     * @param $albumId
     * @return array|object An artist object
     * @throws DeezerAPIException
     */
    public function get($albumId)
    {
        $response = $this->api->sendRequest('GET', "/album/{$albumId}");

        return $response['body'];
    }

    /**
     * Return a list of album's fans. Represented by an array of User objects
     * https://developers.deezer.com/api/album/fans
     *
     * @param $albumId
     * @return array|object A list of object of type user
     * @throws DeezerAPIException
     */
    public function getFans($albumId)
    {
        $response = $this->api->sendRequest('GET', "/album/{$albumId}/fans");

        return $response['body'];
    }

    /**
     * Return a list of album's tracks. Represented by an array of Track objects
     * https://developers.deezer.com/api/album/tracks
     *
     * @param $albumId
     * @return array|object A list of object of type tracks
     * @throws DeezerAPIException
     */
    public function getTracks($albumId)
    {
        $response = $this->api->sendRequest('GET', "/album/{$albumId}/tracks");

        return $response['body'];
    }
}
