<?php

declare(strict_types=1);

namespace Deezer\Resources\Interfaces;

use Deezer\Resources\ResourceInterface;
use Deezer\Types;

/**
 * @phpstan-import-type GenreObject from Types
 * @phpstan-import-type PodcastObject from Types
 * @phpstan-import-type ArtistMini from Types
 * @phpstan-import-type RadioObject from Types
 */
interface GenreResourceInterface extends ResourceInterface
{
    /**
     * @auth none
     * @return object{data: GenreObject[], total: int}
     */
    public function list(): object;
    /**
     * @auth none
     * @param int $id - The genre's Deezer id
     * @return GenreObject
     */
    public function get(int $id): object;
    /**
     * @auth none
     * @param int $id - The genre's Deezer id
     * @return object{data: PodcastObject[], total: int}
     */
    public function getPodcasts(int $id): object;
    /**
     * @auth none
     * @param int $id - The genre's Deezer id
     * @return object{data: ArtistMini[], total: int}
     */
    public function getArtists(int $id): object;
    /**
     * @auth none
     * @param int $id - The genre's Deezer id
     * @return object{data: RadioObject[], total: int}
     */
    public function getRadios(int $id): object;
}
