<?php

namespace Deezer\Resources;

use Deezer\DeezerAPIException;

/**
 * Class ChartResource
 * @package Deezer\Resources
 */
class ChartResource extends AbstractResource
{
    /**
     * Get a charts of a specified genre
     * https://developers.deezer.com/api/chart
     *
     * @param $id - The genre's Deezer id
     * @return array|object A charts of a specified genre
     * @throws DeezerAPIException
     */
    public function get($id)
    {
        $response = $this->api->sendRequest('GET', "/chart/{$id}");

        return $response['body'];
    }

    /**
     * Returns the Top tracks.
     * https://developers.deezer.com/api/chart/tracks
     *
     * @param $id - The genre's Deezer id
     * @return array|object A list of object of type track
     * @throws DeezerAPIException
     */
    public function getTracks($id)
    {
        $response = $this->api->sendRequest('GET', "/chart/{$id}/tracks");

        return $response['body'];
    }

    /**
     * Returns the Top albums.
     * https://developers.deezer.com/api/chart/albums
     *
     * @param $id - The genre's Deezer id
     * @return array|object A list of object of type album
     * @throws DeezerAPIException
     */
    public function getAlbums($id)
    {
        $response = $this->api->sendRequest('GET', "/chart/{$id}/albums");

        return $response['body'];
    }

    /**
     * Returns the Top artists.
     * https://developers.deezer.com/api/chart/artists
     *
     * @param $id - The genre's Deezer id
     * @return array|object A list of object of type artist
     * @throws DeezerAPIException
     */
    public function getArtists($id)
    {
        $response = $this->api->sendRequest('GET', "/chart/{$id}/artists");

        return $response['body'];
    }


    /**
     * Returns the Top playlists.
     * https://developers.deezer.com/api/chart/playlists
     *
     * @param $id - The genre's Deezer id
     * @return array|object A list of object of type playlist
     * @throws DeezerAPIException
     */
    public function getPlaylists($id)
    {
        $response = $this->api->sendRequest('GET', "/chart/{$id}/playlists");

        return $response['body'];
    }

    /**
     * Returns the Top podcasts.
     * https://developers.deezer.com/api/chart/podcasts
     *
     * @param $id - The genre's Deezer id
     * @return array|object A list of object of type podcast
     * @throws DeezerAPIException
     */
    public function getPodcasts($id)
    {
        $response = $this->api->sendRequest('GET', "/chart/{$id}/podcasts");

        return $response['body'];
    }
}
