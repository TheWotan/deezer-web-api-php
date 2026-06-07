<?php

declare(strict_types=1);

namespace Deezer\Resources\Interfaces;

use Deezer\Resources\ResourceInterface;
use Deezer\Types;

/**
 * @phpstan-import-type PlaylistObject from Types
 * @phpstan-import-type Paginated from Types
 */
interface PlaylistResourceInterface extends ResourceInterface
{
    /**
     * @auth none
     * @param int $id - The playlist deezer ID
     * @return PlaylistObject
     */
    public function get(int $id): object;
    /**
     * @auth none
     * @param int $id - The playlist deezer ID
     * @return Paginated
     */
    public function getComments(int $id): object;
    /**
     * @auth none
     * @param int $id - The playlist deezer ID
     * @return Paginated
     */
    public function getFans(int $id): object;
    /**
     * @auth none
     * @param int $id - The playlist deezer ID
     * @return Paginated
     */
    public function getTracks(int $id): object;
    /**
     * @auth none
     * @param int $id - The playlist deezer ID
     * @return Paginated
     */
    public function getRadio(int $id): object;
    /**
     * @auth required
     * @param int $userId - The user's Deezer id
     * @param string $title - The playlist title
     * @return object{id: int}
     */
    public function create(int $userId, string $title): object;
    /**
     * @auth required
     * @param int $id - The playlist deezer ID
     * @return bool
     */
    public function delete(int $id): bool;
    /**
     * @auth required
     * @param int $id - The playlist deezer ID
     * @param array $trackIds - Array of track IDs to add
     * @return bool
     */
    public function addTracks(int $id, array $trackIds): bool;
    /**
     * @auth required
     * @param int $id - The playlist deezer ID
     * @param array $trackIds - Array of track IDs to remove
     * @return bool
     */
    public function removeTracks(int $id, array $trackIds): bool;
}
