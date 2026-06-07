<?php

namespace Deezer\Resources;

use Deezer\DeezerAPIException;
use Deezer\Resources\Interfaces\TrackResourceInterface;

/**
 * Class TrackResource
 * @package Deezer\Resources
 */
class TrackResource extends AbstractResource implements TrackResourceInterface
{
    /**
     * Get An track object
     * https://developers.deezer.com/api/track
     *
     * @param int $id - The track's Deezer id
     * @return array|object An track object
     * @throws DeezerAPIException
     */
    public function get(int $id)
    {
        $response = $this->api->sendRequest('GET', "/track/$id");

        return $response['body'];
    }
}
