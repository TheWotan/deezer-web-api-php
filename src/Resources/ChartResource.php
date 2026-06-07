<?php

namespace Deezer\Resources;

use Deezer\DeezerAPIException;
use Deezer\Resources\Interfaces\ChartResourceInterface;
use Deezer\Types;

/**
 * Class ChartResource
 * @package Deezer\Resources
 *
 * @phpstan-import-type ChartObject from Types
 * @phpstan-import-type Paginated from Types
 */
class ChartResource extends AbstractResource implements ChartResourceInterface
{
    /**
     * Get a charts of a specified genre
     * https://developers.deezer.com/api/chart
     *
     * @auth none
     * @param int $id - The genre's Deezer id
     * @return ChartObject
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
     * @return Paginated
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
     * @return Paginated
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
     * @return Paginated
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
     * @return Paginated
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
     * @return Paginated
     * @throws DeezerAPIException
     */
    public function getPodcasts(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/chart/$id/podcasts");

        return $response['body'];
    }
}
