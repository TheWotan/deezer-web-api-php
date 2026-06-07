<?php

declare(strict_types=1);

namespace Deezer\Resources\Interfaces;

use Deezer\Resources\ResourceInterface;
use Deezer\Types;

/**
 * @phpstan-import-type ChartObject from Types
 * @phpstan-import-type Paginated from Types
 */
interface ChartResourceInterface extends ResourceInterface
{
    /**
     * @auth none
     * @param int $id - The genre's Deezer id
     * @return ChartObject
     */
    public function get(int $id): object;
    /**
     * @auth none
     * @param int $id - The genre's Deezer id
     * @return Paginated
     */
    public function getTracks(int $id): object;
    /**
     * @auth none
     * @param int $id - The genre's Deezer id
     * @return Paginated
     */
    public function getAlbums(int $id): object;
    /**
     * @auth none
     * @param int $id - The genre's Deezer id
     * @return Paginated
     */
    public function getArtists(int $id): object;
    /**
     * @auth none
     * @param int $id - The genre's Deezer id
     * @return Paginated
     */
    public function getPlaylists(int $id): object;
    /**
     * @auth none
     * @param int $id - The genre's Deezer id
     * @return Paginated
     */
    public function getPodcasts(int $id): object;
}
