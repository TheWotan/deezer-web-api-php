<?php

declare(strict_types=1);

namespace Deezer\Resources\Interfaces;

use Deezer\Resources\ResourceInterface;

/**
 * Interface EditorialResourceInterface
 */
interface EditorialResourceInterface extends ResourceInterface
{
    /**
     * @auth none
     * @return object{data: object[], total: int}
     */
    public function list(): object;
    /**
     * @auth none
     * @param int $id - The editorial's Deezer id
     * @return object{
     *   id: int, name: string,
     *   picture: string, picture_small: string, picture_medium: string,
     *   picture_big: string, picture_xl: string, type: string
     * }
     */
    public function get(int $id): object;
    /**
     * @auth none
     * @param int $id - The editorial's Deezer id
     * @return object{data: object[], total: int, next: string|null}
     */
    public function getSelection(int $id): object;
    /**
     * @auth none
     * @param int $id - The editorial's Deezer id
     * @return object{data: object[], total: int, next: string|null}
     */
    public function getCharts(int $id): object;
    /**
     * @auth none
     * @param int $id - The editorial's Deezer id
     * @return object{data: object[], total: int, next: string|null}
     */
    public function getReleases(int $id): object;
}
