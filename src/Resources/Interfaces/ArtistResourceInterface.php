<?php

declare(strict_types=1);

namespace Deezer\Resources\Interfaces;

use Deezer\Resources\ResourceInterface;
use Deezer\Types;

/**
 * @phpstan-import-type ArtistMini from Types
 * @phpstan-import-type Paginated from Types
 */
interface ArtistResourceInterface extends ResourceInterface
{
    /**
     * @auth none
     * @param int $id - The artist's Deezer id
     * @return ArtistMini
     */
    public function get(int $id): object;
    /**
     * @auth none
     * @param int $id - The artist's Deezer id
     * @return Paginated
     */
    public function getTop(int $id): object;
    /**
     * @auth none
     * @param int $id - The artist's Deezer id
     * @return Paginated
     */
    public function getAlbums(int $id): object;
    /**
     * @auth none
     * @param int $id - The artist's Deezer id
     * @return Paginated
     */
    public function getComments(int $id): object;
    /**
     * @auth none
     * @param int $id - The artist's Deezer id
     * @return Paginated
     */
    public function getFans(int $id): object;
    /**
     * @auth none
     * @param int $id - The artist's Deezer id
     * @return Paginated
     */
    public function getRelated(int $id): object;
    /**
     * @auth none
     * @param int $id - The artist's Deezer id
     * @return Paginated
     */
    public function getRadio(int $id): object;
    /**
     * @auth none
     * @param int $id - The artist's Deezer id
     * @return Paginated
     */
    public function getPlaylists(int $id): object;
}
