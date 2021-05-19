<?php

namespace Deezer\Resources;

use Deezer\DeezerAPIException;

/**
 * Class RadioResource
 * @package Deezer\Resources
 */
class RadioResource extends AbstractResource
{
    /**
     * Get An list of radio objects
     * https://developers.deezer.com/api/radio
     *
     * @return array|object A list of object of type radio
     * @throws DeezerAPIException
     */
    public function list()
    {
        $response = $this->api->sendRequest('GET', "/radio");

        return $response['body'];
    }

    /**
     * Get An radio object
     * https://developers.deezer.com/api/radio
     *
     * @param $id - The radio deezer ID
     * @return array|object An radio object
     * @throws DeezerAPIException
     */
    public function get($id)
    {
        $response = $this->api->sendRequest('GET', "/radio/{$id}");

        return $response['body'];
    }

    /**
     * Returns a list of radio splitted by genre
     * https://developers.deezer.com/api/radio/genres
     *
     * @return array|object A list of object of type radio
     * @throws DeezerAPIException
     */
    public function getGenres()
    {
        $response = $this->api->sendRequest('GET', "/radio/genres");

        return $response['body'];
    }

    /**
     * Return the top radios (default to 25 radios).
     * https://developers.deezer.com/api/radio/top
     *
     * @return array|object A list of object of type radio
     * @throws DeezerAPIException
     */
    public function getTop()
    {
        $response = $this->api->sendRequest('GET', "/radio/top");

        return $response['body'];
    }

    /**
     * Returns a list of personal radio splitted by genre (as MIX in website)
     * https://developers.deezer.com/api/radio/lists
     *
     * @return array|object A list of object of type radio
     * @throws DeezerAPIException
     */
    public function getLists()
    {
        $response = $this->api->sendRequest('GET', "/radio/lists");

        return $response['body'];
    }

    /**
     * Returns a list of personal radio splitted by genre (as MIX in website)
     * https://developers.deezer.com/api/radio/lists
     *
     * @param $id - The radio deezer ID
     * @return array|object A list of object of type radio
     * @throws DeezerAPIException
     */
    public function getTracks($id)
    {
        $response = $this->api->sendRequest('GET', "/radio/{$id}/tracks");

        return $response['body'];
    }
}
