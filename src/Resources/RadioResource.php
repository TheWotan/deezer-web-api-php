<?php

namespace Deezer\Resources;

use Deezer\DeezerAPIException;
use Deezer\Resources\Interfaces\RadioResourceInterface;

/**
 * Class RadioResource
 * @package Deezer\Resources
 */
class RadioResource extends AbstractResource implements RadioResourceInterface
{
    /**
     * Get An list of radio objects
     * https://developers.deezer.com/api/radio
     *
     * @auth none
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function list(): object
    {
        $response = $this->api->sendRequest('GET', "/radio");

        return $response['body'];
    }

    /**
     * Get An radio object
     * https://developers.deezer.com/api/radio
     *
     * @auth none
     * @param int $id - The radio deezer ID
     * @return object{
     *   id: int, title: string, description: string, share: string,
     *   picture: string, picture_small: string, picture_medium: string,
     *   picture_big: string, picture_xl: string,
     *   tracklist: string, md5_image: string, type: string
     * }
     * @throws DeezerAPIException
     */
    public function get(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/radio/$id");

        return $response['body'];
    }

    /**
     * Returns a list of radio split by genre
     * https://developers.deezer.com/api/radio/genres
     *
     * @auth none
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getGenres(): object
    {
        $response = $this->api->sendRequest('GET', "/radio/genres");

        return $response['body'];
    }

    /**
     * Return the top radios (default to 25 radios).
     * https://developers.deezer.com/api/radio/top
     *
     * @auth none
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getTop(): object
    {
        $response = $this->api->sendRequest('GET', "/radio/top");

        return $response['body'];
    }

    /**
     * Returns a list of personal radio split by genre (as MIX in website)
     * https://developers.deezer.com/api/radio/lists
     *
     * @auth none
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getLists(): object
    {
        $response = $this->api->sendRequest('GET', "/radio/lists");

        return $response['body'];
    }

    /**
     * Returns a list of personal radio split by genre (as MIX in website)
     * https://developers.deezer.com/api/radio/lists
     *
     * @auth none
     * @param int $id - The radio deezer ID
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getTracks(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/radio/$id/tracks");

        return $response['body'];
    }
}
