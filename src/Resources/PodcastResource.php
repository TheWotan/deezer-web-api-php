<?php

namespace Deezer\Resources;

use Deezer\DeezerAPIException;

/**
 * Class PodcastResource
 * @package Deezer\Resources
 */
class PodcastResource extends AbstractResource
{
    /**
     * Get An podcast object
     * https://developers.deezer.com/api/podcast
     *
     * @param int $id - The podcast deezer ID
     * @return array|object An podcast object
     * @throws DeezerAPIException
     */
    public function get(int $id)
    {
        $response = $this->api->sendRequest('GET', "/podcast/$id");

        return $response['body'];
    }

    /**
     * Returns the list of episodes about the podcast
     * https://developers.deezer.com/api/podcast/episodes
     *
     * @param int $id - The podcast deezer ID
     * @return array|object A list of object of type episode
     * @throws DeezerAPIException
     */
    public function getEpisodes(int $id)
    {
        $response = $this->api->sendRequest('GET', "/podcast/$id/episodes");

        return $response['body'];
    }
}
