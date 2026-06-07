<?php

namespace Deezer\Resources;

use Deezer\DeezerAPIException;
use Deezer\Resources\Interfaces\ArtistResourceInterface;
use Deezer\Types;

/**
 * Class ArtistResource
 * @package Deezer\Resources
 *
 * @phpstan-import-type ArtistMini from Types
 * @phpstan-import-type Paginated from Types
 */
class ArtistResource extends AbstractResource implements ArtistResourceInterface
{
    /**
     * Get An artist object
     * https://developers.deezer.com/api/artist
     *
     * @auth none
     * @param int $id - The artist's Deezer id
     * @return ArtistMini
     * @throws DeezerAPIException
     */
    public function get(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/artist/$id");

        return $response['body'];
    }

    /**
     * Get the top 5 tracks of an artist
     * https://developers.deezer.com/api/artist/top
     *
     * @auth none
     * @param int $id - The artist's Deezer id
     * @return Paginated
     * @throws DeezerAPIException
     */
    public function getTop(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/artist/$id/top");

        return $response['body'];
    }

    /**
     * Return a list of artist's albums. Represented by an array of Album objects
     * https://developers.deezer.com/api/artist/albums
     *
     * @auth none
     * @param int $id - The artist's Deezer id
     * @return Paginated
     * @throws DeezerAPIException
     */
    public function getAlbums(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/artist/$id/albums");

        return $response['body'];
    }

    /**
     * Return a list of artist's comments. Represented by an array of Comment objects
     * https://developers.deezer.com/api/artist/comments
     *
     * @auth none
     * @param int $id - The artist's Deezer id
     * @return Paginated
     * @throws DeezerAPIException
     */
    public function getComments(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/artist/$id/comments");

        return $response['body'];
    }

    /**
     * Return a list of artist's fans. Represented by an array of User objects
     * https://developers.deezer.com/api/artist/fans
     *
     * @auth none
     * @param int $id - The artist's Deezer id
     * @return Paginated
     * @throws DeezerAPIException
     */
    public function getFans(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/artist/$id/fans");

        return $response['body'];
    }

    /**
     * Return a list of related artists. Represented by an array of Artist objects
     * https://developers.deezer.com/api/artist/related
     *
     * @auth none
     * @param int $id - The artist's Deezer id
     * @return Paginated
     * @throws DeezerAPIException
     */
    public function getRelated(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/artist/$id/related");

        return $response['body'];
    }

    /**
     * Return a list of tracks. Represented by an array of Track object
     * https://developers.deezer.com/api/artist/radio
     *
     * @auth none
     * @param int $id - The artist's Deezer id
     * @return Paginated
     * @throws DeezerAPIException
     */
    public function getRadio(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/artist/$id/radio");

        return $response['body'];
    }

    /**
     * Return a list of artist's playlists. Represented by an array of Playlist object
     * https://developers.deezer.com/api/artist/playlists
     *
     * @auth none
     * @param int $id - The artist's Deezer id
     * @return Paginated
     * @throws DeezerAPIException
     */
    public function getPlaylists(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/artist/$id/playlists");

        return $response['body'];
    }
}
