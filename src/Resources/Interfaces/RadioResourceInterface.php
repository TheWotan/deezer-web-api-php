<?php

declare(strict_types=1);

namespace Deezer\Resources\Interfaces;

use Deezer\Resources\ResourceInterface;

/**
 * Interface RadioResourceInterface
 */
interface RadioResourceInterface extends ResourceInterface
{
    /**
     * @auth none
     * @return object{data: object[], total: int, next: string|null}
     */
    public function list(): object;
    /**
     * @auth none
     * @param int $id - The radio deezer ID
     * @return object{
     *   id: int, title: string, description: string, share: string,
     *   picture: string, picture_small: string, picture_medium: string,
     *   picture_big: string, picture_xl: string,
     *   tracklist: string, md5_image: string, type: string
     * }
     */
    public function get(int $id): object;
    /**
     * @auth none
     * @return object{data: object[], total: int, next: string|null}
     */
    public function getGenres(): object;
    /**
     * @auth none
     * @return object{data: object[], total: int, next: string|null}
     */
    public function getTop(): object;
    /**
     * @auth none
     * @return object{data: object[], total: int, next: string|null}
     */
    public function getLists(): object;
    /**
     * @auth none
     * @param int $id - The radio deezer ID
     * @return object{data: object[], total: int, next: string|null}
     */
    public function getTracks(int $id): object;
}
