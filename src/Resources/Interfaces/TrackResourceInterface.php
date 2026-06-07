<?php

declare(strict_types=1);

namespace Deezer\Resources\Interfaces;

use Deezer\Resources\ResourceInterface;

/**
 * Interface TrackResourceInterface
 */
interface TrackResourceInterface extends ResourceInterface
{
    /**
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
     */
    public function get(int $id): object;
}
