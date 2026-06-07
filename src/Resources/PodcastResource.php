<?php

namespace Deezer\Resources;

use Deezer\DeezerAPIException;
use Deezer\Resources\Interfaces\PodcastResourceInterface;
use Deezer\Types;

/**
 * Class PodcastResource
 * @package Deezer\Resources
 *
 * @phpstan-import-type PodcastObject from Types
 * @phpstan-import-type Paginated from Types
 */
class PodcastResource extends AbstractResource implements PodcastResourceInterface
{
    /**
     * Get An podcast object
     * https://developers.deezer.com/api/podcast
     *
     * @auth required
     * @param int $id - The podcast deezer ID
     * @return PodcastObject
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
     * @return Paginated
     * @throws DeezerAPIException
     */
    public function getEpisodes(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/podcast/$id/episodes");

        return $response['body'];
    }
}
