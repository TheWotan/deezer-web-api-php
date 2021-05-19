<?php

namespace Deezer\Resources;

use Deezer\DeezerAPIException;

/**
 * Class TrackResource
 * @package Deezer\Resources
 */
class TrackResource extends AbstractResource
{
    /**
     * Get An track object
     * https://developers.deezer.com/api/track
     *
     * @param $id - The track's Deezer id
     * @return array|object An track object
     * @throws DeezerAPIException
     */
    public function get($id)
    {
        $response = $this->api->sendRequest('GET', "/track/{$id}");

        return $response['body'];
    }
}
