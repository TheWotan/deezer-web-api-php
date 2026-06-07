<?php

namespace Deezer\Resources;

use Deezer\DeezerAPIException;
use Deezer\Resources\Interfaces\ChartResourceInterface;

/**
 * Class ChartResource
 * @package Deezer\Resources
 */
class ChartResource extends AbstractResource implements ChartResourceInterface
{
    /**
     * Get a charts of a specified genre
     * https://developers.deezer.com/api/chart
     *
     * @auth none
     * @param int $id - The genre's Deezer id
     * @return object{
     *   tracks: object{data: object[], total: int},
     *   albums: object{data: object[], total: int},
     *   artists: object{data: object[], total: int},
     *   playlists: object{data: object[], total: int},
     *   podcasts: object{data: object[], total: int}
     * }
     * @throws DeezerAPIException
     */
    public function get(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/chart/$id");

        return $response['body'];
    }

    /**
     * Returns the Top tracks.
     * https://developers.deezer.com/api/chart/tracks
     *
     * @auth none
     * @param int $id - The genre's Deezer id
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getTracks(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/chart/$id/tracks");

        return $response['body'];
    }

    /**
     * Returns the Top albums.
     * https://developers.deezer.com/api/chart/albums
     *
     * @auth none
     * @param int $id - The genre's Deezer id
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getAlbums(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/chart/$id/albums");

        return $response['body'];
    }

    /**
     * Returns the Top artists.
     * https://developers.deezer.com/api/chart/artists
     *
     * @auth none
     * @param int $id - The genre's Deezer id
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getArtists(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/chart/$id/artists");

        return $response['body'];
    }


    /**
     * Returns the Top playlists.
     * https://developers.deezer.com/api/chart/playlists
     *
     * @auth none
     * @param int $id - The genre's Deezer id
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getPlaylists(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/chart/$id/playlists");

        return $response['body'];
    }

    /**
     * Returns the Top podcasts.
     * https://developers.deezer.com/api/chart/podcasts
     *
     * @auth none
     * @param int $id - The genre's Deezer id
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getPodcasts(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/chart/$id/podcasts");

        return $response['body'];
    }
}
