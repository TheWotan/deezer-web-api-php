<?php

namespace Deezer\Resources;

use Deezer\DeezerAPIException;
use Deezer\Resources\Interfaces\GenreResourceInterface;

/**
 * Class GenreResource
 * @package Deezer\Resources
 */
class GenreResource extends AbstractResource implements GenreResourceInterface
{
    /**
     * Get An list of genre objects
     * https://developers.deezer.com/api/genre
     *
     * @auth none
     * @return object{data: object[], total: int}
     * @throws DeezerAPIException
     */
    public function list(): object
    {
        $response = $this->api->sendRequest('GET', "/genre");

        return $response['body'];
    }

    /**
     * Get An genre object
     * https://developers.deezer.com/api/genre
     *
     * @auth none
     * @param int $id - The genre's Deezer id
     * @return object{
     *   id: int, name: string,
     *   picture: string, picture_small: string, picture_medium: string,
     *   picture_big: string, picture_xl: string, type: string
     * }
     * @throws DeezerAPIException
     */
    public function get(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/genre/$id");

        return $response['body'];
    }

    /**
     * Not supported
     * Returns all podcasts for a genre
     * https://developers.deezer.com/api/genre/podcasts
     *
     * @auth none
     * @param int $id - The genre's Deezer id
     * @return object{data: object[], total: int}
     * @throws DeezerAPIException
     */
    public function getPodcasts(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/genre/$id/podcasts");

        return $response['body'];
    }

    /**
     * Returns all artists for a genre
     * https://developers.deezer.com/api/genre/artists
     *
     * @auth none
     * @param int $id - The genre's Deezer id
     * @return object{data: object[], total: int}
     * @throws DeezerAPIException
     */
    public function getArtists(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/genre/$id/artists");

        return $response['body'];
    }

    /**
     * Returns all radios for a genre
     * https://developers.deezer.com/api/genre/radios
     *
     * @auth none
     * @param int $id - The genre's Deezer id
     * @return object{data: object[], total: int}
     * @throws DeezerAPIException
     */
    public function getRadios(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/genre/$id/radios");

        return $response['body'];
    }
}
