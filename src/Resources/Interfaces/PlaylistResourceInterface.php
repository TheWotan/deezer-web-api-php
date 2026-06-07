<?php

declare(strict_types=1);

namespace Deezer\Resources\Interfaces;

use Deezer\Resources\ResourceInterface;

/**
 * Interface PlaylistResourceInterface
 */
interface PlaylistResourceInterface extends ResourceInterface
{
    /**
     * @auth none
     * @param int $id - The playlist deezer ID
     * @return object{
     *   id: int, title: string, description: string, duration: int,
     *   public: bool, is_loved_track: bool, collaborative: bool,
     *   nb_tracks: int, fans: int, link: string, share: string,
     *   picture: string, picture_small: string, picture_medium: string,
     *   picture_big: string, picture_xl: string, checksum: string,
     *   tracklist: string, creation_date: string,
     *   add_date: string, mod_date: string,
     *   md5_image: string, picture_type: string,
     *   creator: object{id: int, name: string, tracklist: string, type: string},
     *   type: string, tracks: object{data: object[], checksum: string}
     * }
     */
    public function get(int $id): object;
    /**
     * @auth none
     * @param int $id - The playlist deezer ID
     * @return object{data: object[], total: int, next: string|null}
     */
    public function getComments(int $id): object;
    /**
     * @auth none
     * @param int $id - The playlist deezer ID
     * @return object{data: object[], total: int, next: string|null}
     */
    public function getFans(int $id): object;
    /**
     * @auth none
     * @param int $id - The playlist deezer ID
     * @return object{data: object[], total: int, next: string|null}
     */
    public function getTracks(int $id): object;
    /**
     * @auth none
     * @param int $id - The playlist deezer ID
     * @return object{data: object[], total: int, next: string|null}
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
