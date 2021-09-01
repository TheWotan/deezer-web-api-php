<?php

namespace Deezer\Resources;

use Deezer\DeezerAPIException;

/**
 * Class EpisodeResource
 * @package Deezer\Resources
 */
class EpisodeResource extends AbstractResource
{
    /**
     * Get An podcast object
     * https://developers.deezer.com/api/episode
     *
     * @param int $id - The episode deezer ID
     * @return array|object An episode object
     * @throws DeezerAPIException
     */
    public function get(int $id)
    {
        $response = $this->api->sendRequest('GET', "/episode/$id");

        return $response['body'];
    }
}
