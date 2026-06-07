<?php

declare(strict_types=1);

namespace Deezer\Resources\Interfaces;

use Deezer\Resources\ResourceInterface;

/**
 * Interface AlbumResourceInterface
 */
interface AlbumResourceInterface extends ResourceInterface
{
    /**
     * @auth none
     * @param int $id - The album's Deezer id
     * @return object{
     *   id: int, title: string, upc: string, link: string, share: string,
     *   cover: string, cover_small: string, cover_medium: string,
     *   cover_big: string, cover_xl: string, md5_image: string,
     *   genre_id: int, genres: object{data: object[]},
     *   label: string, nb_tracks: int, duration: int, fans: int,
     *   release_date: string, record_type: string, available: bool,
     *   tracklist: string, explicit_lyrics: bool,
     *   explicit_content_lyrics: int, explicit_content_cover: int,
     *   contributors: object[], artist: object{id: int, name: string, type: string},
     *   type: string, tracks: object{data: object[], checksum: string}
     * }
     */
    public function get(int $id): object;
    /**
     * @auth none
     * @param int $id - The album's Deezer id
     * @return object{data: object[], total: int, next: string|null}
     */
    public function getComments(int $id): object;
    /**
     * @auth none
     * @param int $id - The album's Deezer id
     * @return object{data: object[], total: int, next: string|null}
     */
    public function getFans(int $id): object;
    /**
     * @auth none
     * @param int $id - The album's Deezer id
     * @return object{data: object[], total: int, next: string|null}
     */
    public function getTracks(int $id): object;
}
