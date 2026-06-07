<?php

namespace Deezer\Resources;

use Deezer\DeezerAPIException;
use Deezer\Resources\Interfaces\AlbumResourceInterface;
use Deezer\Types;

/**
 * Class AlbumResource
 * @package Deezer\Resources
 *
 * @phpstan-import-type AlbumObject from Types
 * @phpstan-import-type Paginated from Types
 */
class AlbumResource extends AbstractResource implements AlbumResourceInterface
{
    /**
     * Get An album object
     * https://developers.deezer.com/api/album
     *
     * @auth none
     * @param int $id - The album's Deezer id
     * @return AlbumObject
     * @throws DeezerAPIException
     */
    public function get(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/album/$id");

        return $response['body'];
    }

    /**
     * Return a list of album's comments. Represented by an array of Comment objects
     * https://developers.deezer.com/api/album/comments
     *
     * @auth none
     * @param int $id - The album's Deezer id
     * @return Paginated
     * @throws DeezerAPIException
     */
    public function getComments(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/album/$id/comments");

        return $response['body'];
    }

    /**
     * Return a list of album's fans. Represented by an array of User objects
     * https://developers.deezer.com/api/album/fans
     *
     * @auth none
     * @param int $id - The album's Deezer id
     * @return Paginated
     * @throws DeezerAPIException
     */
    public function getFans(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/album/$id/fans");

        return $response['body'];
    }

    /**
     * Return a list of album's tracks. Represented by an array of Track objects
     * https://developers.deezer.com/api/album/tracks
     *
     * @auth none
     * @param int $id - The album's Deezer id
     * @return Paginated
     * @throws DeezerAPIException
     */
    public function getTracks(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/album/$id/tracks");

        return $response['body'];
    }
}
