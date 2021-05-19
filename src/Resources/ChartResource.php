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
     * @param $genreId
     * @return array|object A charts of a specified genre
     * @throws DeezerAPIException
     */
    public function get($genreId)
    {
        $response = $this->api->sendRequest('GET', "/chart/{$genreId}");

        return $response['body'];
    }

    /**
     * Returns the Top tracks.
     * https://developers.deezer.com/api/chart/tracks
     *
     * @param $genreId
     * @return array|object A list of object of type track
     * @throws DeezerAPIException
     */
    public function getTracks($genreId)
    {
        $response = $this->api->sendRequest('GET', "/chart/{$genreId}/tracks");

        return $response['body'];
    }

    /**
     * Returns the Top albums.
     * https://developers.deezer.com/api/chart/albums
     *
     * @param $genreId
     * @return array|object A list of object of type album
     * @throws DeezerAPIException
     */
    public function getAlbums($genreId)
    {
        $response = $this->api->sendRequest('GET', "/chart/{$genreId}/albums");

        return $response['body'];
    }

    /**
     * Returns the Top artists.
     * https://developers.deezer.com/api/chart/artists
     *
     * @param $genreId
     * @return array|object A list of object of type artist
     * @throws DeezerAPIException
     */
    public function getArtists($genreId)
    {
        $response = $this->api->sendRequest('GET', "/chart/{$genreId}/artists");

        return $response['body'];
    }


    /**
     * Returns the Top playlists.
     * https://developers.deezer.com/api/chart/playlists
     *
     * @param $genreId
     * @return array|object A list of object of type playlist
     * @throws DeezerAPIException
     */
    public function getPlaylists($genreId)
    {
        $response = $this->api->sendRequest('GET', "/chart/{$genreId}/playlists");

        return $response['body'];
    }

    /**
     * Returns the Top podcasts.
     * https://developers.deezer.com/api/chart/podcasts
     *
     * @param $genreId
     * @return array|object A list of object of type podcast
     * @throws DeezerAPIException
     */
    public function getPodcasts($genreId)
    {
        $response = $this->api->sendRequest('GET', "/chart/{$genreId}/podcasts");

        return $response['body'];
    }
}
