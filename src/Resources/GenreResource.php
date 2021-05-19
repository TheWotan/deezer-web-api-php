<?php

namespace Deezer\Resources;

use Deezer\DeezerAPIException;

/**
 * Class GenreResource
 * @package Deezer\Resources
 */
class GenreResource extends AbstractResource
{
    /**
     * Get An list of genre objects
     * https://developers.deezer.com/api/genre
     *
     * @return array|object A list of object of type genre
     * @throws DeezerAPIException
     */
    public function list()
    {
        $response = $this->api->sendRequest('GET', "/genre");

        return $response['body'];
    }

    /**
     * Get An genre object
     * https://developers.deezer.com/api/genre
     *
     * @param $id - The genre's Deezer id
     * @return array|object An genre object
     * @throws DeezerAPIException
     */
    public function get($id)
    {
        $response = $this->api->sendRequest('GET', "/genre/{$id}");

        return $response['body'];
    }

    /**
     * Returns all podcasts for a genre
     * https://developers.deezer.com/api/genre/podcasts
     *
     * @param $id - The genre's Deezer id
     * @return array|object A list of object of type podcast
     * @throws DeezerAPIException
     */
    public function getPodcasts($id)
    {
        $response = $this->api->sendRequest('GET', "/genre/{$id}/podcasts");

        return $response['body'];
    }

    /**
     * Returns all artists for a genre
     * https://developers.deezer.com/api/genre/artists
     *
     * @param $id - The genre's Deezer id
     * @return array|object A list of object of type artist
     * @throws DeezerAPIException
     */
    public function getArtists($id)
    {
        $response = $this->api->sendRequest('GET', "/genre/{$id}/artists");

        return $response['body'];
    }

    /**
     * Returns all radios for a genre
     * https://developers.deezer.com/api/genre/radios
     *
     * @param $id - The genre's Deezer id
     * @return array|object A list of object of type radio
     * @throws DeezerAPIException
     */
    public function getRadios($id)
    {
        $response = $this->api->sendRequest('GET', "/genre/{$id}/radios");

        return $response['body'];
    }
}
