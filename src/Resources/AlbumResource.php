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
     * @param int $id - The album's Deezer id
     * @return array|object An artist object
     * @throws DeezerAPIException
     */
    public function get(int $id)
    {
        $response = $this->api->sendRequest('GET', "/album/$id");

        return $response['body'];
    }

    /**
     * Return a list of album's fans. Represented by an array of User objects
     * https://developers.deezer.com/api/album/fans
     *
     * @param int $id - The album's Deezer id
     * @return array|object A list of object of type user
     * @throws DeezerAPIException
     */
    public function getFans(int $id)
    {
        $response = $this->api->sendRequest('GET', "/album/$id/fans");

        return $response['body'];
    }

    /**
     * Return a list of album's tracks. Represented by an array of Track objects
     * https://developers.deezer.com/api/album/tracks
     *
     * @param int $id - The album's Deezer id
     * @return array|object A list of object of type tracks
     * @throws DeezerAPIException
     */
    public function getTracks(int $id)
    {
        $response = $this->api->sendRequest('GET', "/album/$id/tracks");

        return $response['body'];
    }
}
