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
     * @auth none
     * @param int $id - The track's Deezer id
     * @return object{
     *   id: int, readable: bool, title: string, title_short: string,
     *   title_version: string, isrc: string, link: string, share: string,
     *   duration: int, track_position: int, disk_number: int, rank: int,
     *   release_date: string, explicit_lyrics: bool,
     *   explicit_content_lyrics: int, explicit_content_cover: int,
     *   preview: string, bpm: float, gain: float,
     *   available_countries: string[], contributors: object[],
     *   md5_image: string, track_token: string,
     *   artist: object{id: int, name: string, type: string},
     *   album: object{id: int, title: string, type: string}, type: string
     * }
     * @throws DeezerAPIException
     */
    public function get(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/track/$id");

        return $response['body'];
    }
}
