<?php

namespace Deezer\Resources;

use Deezer\DeezerAPIException;
use Deezer\Resources\Interfaces\EpisodeResourceInterface;
use Deezer\Types;

/**
 * Class EpisodeResource
 * @package Deezer\Resources
 *
 * @phpstan-import-type EpisodeObject from Types
 */
class EpisodeResource extends AbstractResource implements EpisodeResourceInterface
{
    /**
     * Get An podcast object
     * https://developers.deezer.com/api/episode
     *
     * @auth required
     * @param int $id - The episode deezer ID
     * @return EpisodeObject
     * @throws DeezerAPIException
     */
    public function get(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/episode/$id");

        return $response['body'];
    }
}
