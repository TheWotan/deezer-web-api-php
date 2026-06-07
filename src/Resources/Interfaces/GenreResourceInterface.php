<?php

declare(strict_types=1);

namespace Deezer\Resources\Interfaces;

use Deezer\Resources\ResourceInterface;

/**
 * Interface GenreResourceInterface
 */
interface GenreResourceInterface extends ResourceInterface
{
    /**
     * @auth none
     * @return object{data: object[], total: int}
     */
    public function list(): object;
    /**
     * @auth none
     * @param int $id - The genre's Deezer id
     * @return object{
     *   id: int, name: string,
     *   picture: string, picture_small: string, picture_medium: string,
     *   picture_big: string, picture_xl: string, type: string
     * }
     */
    public function get(int $id): object;
    /**
     * @auth none
     * @param int $id - The genre's Deezer id
     * @return object{data: object[], total: int}
     */
    public function getPodcasts(int $id): object;
    /**
     * @auth none
     * @param int $id - The genre's Deezer id
     * @return object{data: object[], total: int}
     */
    public function getArtists(int $id): object;
    /**
     * @auth none
     * @param int $id - The genre's Deezer id
     * @return object{data: object[], total: int}
     */
    public function getRadios(int $id): object;
}
