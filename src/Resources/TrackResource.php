<?php

namespace Deezer\Resources;

use Deezer\DeezerAPIException;
use Deezer\Resources\Interfaces\TrackResourceInterface;
use Deezer\Types;

/**
 * Class TrackResource
 * @package Deezer\Resources
 *
 * @phpstan-import-type TrackObject from Types
 */
class TrackResource extends AbstractResource implements TrackResourceInterface
{
    /**
     * Get An track object
     * https://developers.deezer.com/api/track
     *
     * @auth none
     * @param int $id - The track's Deezer id
     * @return TrackObject
     * @throws DeezerAPIException
     */
    public function get(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/track/$id");

        return $response['body'];
    }
}
