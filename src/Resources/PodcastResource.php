<?php

namespace Deezer\Resources;

use Deezer\DeezerAPIException;
use Deezer\Resources\Interfaces\PodcastResourceInterface;

/**
 * Class PodcastResource
 * @package Deezer\Resources
 */
class PodcastResource extends AbstractResource implements PodcastResourceInterface
{
    /**
     * Get An podcast object
     * https://developers.deezer.com/api/podcast
     *
     * @auth required
     * @param int $id - The podcast deezer ID
     * @return object{
     *   id: int, title: string, description: string, available: bool,
     *   rating: int, fans: int, link: string, share: string,
     *   picture: string, picture_small: string, picture_medium: string,
     *   picture_big: string, picture_xl: string,
     *   md5_image: string, type: string
     * }
     * @throws DeezerAPIException
     */
    public function get(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/podcast/$id");

        return $response['body'];
    }

    /**
     * Returns the list of episodes about the podcast
     * https://developers.deezer.com/api/podcast/episodes
     *
     * @auth required
     * @param int $id - The podcast deezer ID
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getEpisodes(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/podcast/$id/episodes");

        return $response['body'];
    }
}
