<?php

declare(strict_types=1);

namespace Deezer\Resources\Interfaces;

use Deezer\Resources\ResourceInterface;
use Deezer\Types;

/**
 * @phpstan-import-type UserObject from Types
 * @phpstan-import-type Paginated from Types
 */
interface UserResourceInterface extends ResourceInterface
{
    /**
     * @auth none
     * @param int $id - The user's Deezer id
     * @return UserObject
     */
    public function get(int $id): object;
    /**
     * @auth required
     * @return UserObject
     */
    public function me(): object;
    /**
     * @auth required
     * @return Paginated
     */
    public function getAlbums(): object;
    /**
     * @auth none
     * @param int $id - The user's Deezer id
     * @return Paginated
     */
    public function getAlbumsById(int $id): object;
    /**
     * @auth required
     * @return Paginated
     */
    public function getArtists(): object;
    /**
     * @auth none
     * @param int $id - The user's Deezer id
     * @return Paginated
     */
    public function getArtistsById(int $id): object;
    /**
     * @auth required
     * @return Paginated
     */
    public function getFlow(): object;
    /**
     * @auth required
     * @return Paginated
     */
    public function getFolders(): object;
    /**
     * @auth required
     * @return Paginated
     */
    public function getFollowings(): object;
    /**
     * @auth required
     * @return Paginated
     */
    public function getFollowers(): object;
    /**
     * @auth none
     * @param int $id - The user's Deezer id
     * @return Paginated
     */
    public function getFollowingsById(int $id): object;
    /**
     * @auth none
     * @param int $id - The user's Deezer id
     * @return Paginated
     */
    public function getFollowersById(int $id): object;
    /**
     * @auth required
     * @return Paginated
     */
    public function getHistory(): object;
    /**
     * @auth required
     * @return Paginated
     */
    public function getPermissions(): object;
    /**
     * @auth required
     * @return Paginated
     */
    public function getOptions(): object;
    /**
     * @auth required
     * @return Paginated
     */
    public function getPersonalSongs(): object;
    /**
     * @auth required
     * @return Paginated
     */
    public function getPlaylists(): object;
    /**
     * @auth none
     * @param int $id - The user's Deezer id
     * @return Paginated
     */
    public function getPlaylistsById(int $id): object;
    /**
     * @auth required
     * @return Paginated
     */
    public function getRadios(): object;
    /**
     * @auth required
     * @return Paginated
     */
    public function getTracks(): object;
    /**
     * @auth required
     * @return Paginated
     */
    public function getRecommendationsAlbums(): object;
    /**
     * @auth required
     * @return Paginated
     */
    public function getRecommendationsReleases(): object;
    /**
     * @auth required
     * @return Paginated
     */
    public function getRecommendationsArtists(): object;
    /**
     * @auth required
     * @return Paginated
     */
    public function getRecommendationsPlaylists(): object;
    /**
     * @auth required
     * @return Paginated
     */
    public function getRecommendationsTracks(): object;
    /**
     * @auth required
     * @return Paginated
     */
    public function getRecommendationsRadios(): object;
    /**
     * @auth required
     * @return Paginated
     */
    public function getChartsTracks(): object;
    /**
     * @auth required
     * @return Paginated
     */
    public function getChartsAlbums(): object;
    /**
     * @auth required
     * @return Paginated
     */
    public function getChartsPlaylists(): object;
    /**
     * @auth required
     * @return Paginated
     */
    public function getChartsArtists(): object;
    /**
     * @auth required
     * @param int $albumId - The album's Deezer id
     * @return bool
     */
    public function addAlbum(int $albumId): bool;
    /**
     * @auth required
     * @param int $albumId - The album's Deezer id
     * @return bool
     */
    public function removeAlbum(int $albumId): bool;
    /**
     * @auth required
     * @param int $artistId - The artist's Deezer id
     * @return bool
     */
    public function followArtist(int $artistId): bool;
    /**
     * @auth required
     * @param int $artistId - The artist's Deezer id
     * @return bool
     */
    public function unfollowArtist(int $artistId): bool;
    /**
     * @auth required
     * @param int $userId - The user's Deezer id to follow
     * @return bool
     */
    public function followUser(int $userId): bool;
    /**
     * @auth required
     * @param int $userId - The user's Deezer id to unfollow
     * @return bool
     */
    public function unfollowUser(int $userId): bool;
    /**
     * @auth required
     * @param int $trackId - The track's Deezer id
     * @return bool
     */
    public function addTrack(int $trackId): bool;
    /**
     * @auth required
     * @param int $trackId - The track's Deezer id
     * @return bool
     */
    public function removeTrack(int $trackId): bool;
    /**
     * @auth required
     * @param int $radioId - The radio's Deezer id
     * @return bool
     */
    public function addRadio(int $radioId): bool;
    /**
     * @auth required
     * @param int $radioId - The radio's Deezer id
     * @return bool
     */
    public function removeRadio(int $radioId): bool;
    /**
     * @auth required
     * @param string $title - The playlist title
     * @return object{id: int}
     */
    public function createPlaylist(string $title): object;
}
