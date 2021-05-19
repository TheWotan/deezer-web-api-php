<?php

namespace Deezer\Resources;

use Deezer\DeezerAPIException;

/**
 * Class ArtistResource
 * @package Deezer\Resources
 */
class ArtistResource extends AbstractResource
{
    /**
     * Get An artist object
     * https://developers.deezer.com/api/artist
     *
     * @param $artistId
     * @return array|object An artist object
     * @throws DeezerAPIException
     */
    public function get($artistId)
    {
        $response = $this->api->sendRequest('GET', "/artist/{$artistId}");

        return $response['body'];
    }

    /**
     * Get the top 5 tracks of an artist
     * https://developers.deezer.com/api/artist/top
     *
     * @param $artistId
     * @return array|object A list of object of type track
     * @throws DeezerAPIException
     */
    public function getTop($artistId)
    {
        $response = $this->api->sendRequest('GET', "/artist/{$artistId}/top");

        return $response['body'];
    }

    /**
     * Return a list of artist's albums. Represented by an array of Album objects
     * https://developers.deezer.com/api/artist/albums
     *
     * @param $artistId
     * @return array|object A list of object of type album
     * @throws DeezerAPIException
     */
    public function getAlbums($artistId)
    {
        $response = $this->api->sendRequest('GET', "/artist/{$artistId}/albums");

        return $response['body'];
    }

    /**
     * Return a list of artist's fans. Represented by an array of User objects
     * https://developers.deezer.com/api/artist/fans
     *
     * @param $artistId
     * @return array|object A list of object of type user
     * @throws DeezerAPIException
     */
    public function getFans($artistId)
    {
        $response = $this->api->sendRequest('GET', "/artist/{$artistId}/fans");

        return $response['body'];
    }

    /**
     * Return a list of related artists. Represented by an array of Artist objects
     * https://developers.deezer.com/api/artist/related
     *
     * @param $id
     * @return array|object A list of object of type artist
     * @throws DeezerAPIException
     */
    public function getRelated($id)
    {
        $response = $this->api->sendRequest('GET', "/artist/{$id}/related");

        return $response['body'];
    }

    /**
     * Return a list of tracks. Represented by an array of Track object
     * https://developers.deezer.com/api/artist/radio
     *
     * @param $artistId
     * @return array|object A list of object of type track
     * @throws DeezerAPIException
     */
    public function getRadio($artistId)
    {
        $response = $this->api->sendRequest('GET', "/artist/{$artistId}/radio");

        return $response['body'];
    }

    /**
     * Return a list of artist's playlists. Represented by an array of Playlist object
     * https://developers.deezer.com/api/artist/playlists
     *
     * @param $artistId
     * @return array|object A list of object of type playlist
     * @throws DeezerAPIException
     */
    public function getPlaylists($artistId)
    {
        $response = $this->api->sendRequest('GET', "/artist/{$artistId}/playlists");

        return $response['body'];
    }
}
