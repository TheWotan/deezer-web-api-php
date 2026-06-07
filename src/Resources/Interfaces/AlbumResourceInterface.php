<?php

declare(strict_types=1);

namespace Deezer\Resources\Interfaces;

use Deezer\Resources\ResourceInterface;
use Deezer\Types;

/**
 * @phpstan-import-type AlbumObject from Types
 * @phpstan-import-type Paginated from Types
 */
interface AlbumResourceInterface extends ResourceInterface
{
    /**
     * @auth none
     * @param int $id - The album's Deezer id
     * @return AlbumObject
     */
    public function get(int $id): object;
    /**
     * @auth none
     * @param int $id - The album's Deezer id
     * @return Paginated
     */
    public function getComments(int $id): object;
    /**
     * @auth none
     * @param int $id - The album's Deezer id
     * @return Paginated
     */
    public function getFans(int $id): object;
    /**
     * @auth none
     * @param int $id - The album's Deezer id
     * @return Paginated
     */
    public function getTracks(int $id): object;
}
