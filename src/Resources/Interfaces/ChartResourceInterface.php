<?php

declare(strict_types=1);

namespace Deezer\Resources\Interfaces;

use Deezer\Resources\ResourceInterface;

/**
 * Interface ChartResourceInterface
 */
interface ChartResourceInterface extends ResourceInterface
{
    /**
     * @auth none
     * @param int $id - The genre's Deezer id
     * @return object{
     *   tracks: object{data: object[], total: int},
     *   albums: object{data: object[], total: int},
     *   artists: object{data: object[], total: int},
     *   playlists: object{data: object[], total: int},
     *   podcasts: object{data: object[], total: int}
     * }
     */
    public function get(int $id): object;
    /**
     * @auth none
     * @param int $id - The genre's Deezer id
     * @return object{data: object[], total: int, next: string|null}
     */
    public function getTracks(int $id): object;
    /**
     * @auth none
     * @param int $id - The genre's Deezer id
     * @return object{data: object[], total: int, next: string|null}
     */
    public function getAlbums(int $id): object;
    /**
     * @auth none
     * @param int $id - The genre's Deezer id
     * @return object{data: object[], total: int, next: string|null}
     */
    public function getArtists(int $id): object;
    /**
     * @auth none
     * @param int $id - The genre's Deezer id
     * @return object{data: object[], total: int, next: string|null}
     */
    public function getPlaylists(int $id): object;
    /**
     * @auth none
     * @param int $id - The genre's Deezer id
     * @return object{data: object[], total: int, next: string|null}
     */
    public function getPodcasts(int $id): object;
}
