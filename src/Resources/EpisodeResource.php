<?php

namespace Deezer\Resources;

use Deezer\DeezerAPIException;
use Deezer\Resources\Interfaces\EpisodeResourceInterface;

/**
 * Class EpisodeResource
 * @package Deezer\Resources
 */
class EpisodeResource extends AbstractResource implements EpisodeResourceInterface
{
    /**
     * Get An podcast object
     * https://developers.deezer.com/api/episode
     *
     * @auth required
     * @param int $id - The episode deezer ID
     * @return object{
     *   id: int, title: string, description: string, available: bool,
     *   release_date: string, duration: int, link: string, share: string,
     *   picture: string, picture_small: string, picture_medium: string,
     *   picture_big: string, picture_xl: string, md5_image: string,
     *   podcast: object{id: int, title: string, type: string}, type: string
     * }
     * @throws DeezerAPIException
     */
    public function get(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/episode/$id");

        return $response['body'];
    }
}
