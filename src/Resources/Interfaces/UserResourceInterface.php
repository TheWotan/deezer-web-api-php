<?php

declare(strict_types=1);

namespace Deezer\Resources\Interfaces;

use Deezer\Resources\ResourceInterface;

interface UserResourceInterface extends ResourceInterface
{
    public function get(int $id);
    public function me();
    public function getAlbums();
    public function getAlbumsById(int $id);
    public function getArtists();
    public function getArtistsById(int $id);
    public function getFlow();
    public function getFolders();
    public function getFollowings();
    public function getFollowers();
    public function getFollowingsById(int $id);
    public function getFollowersById(int $id);
    public function getHistory();
    public function getPermissions();
    public function getOptions();
    public function getPersonalSongs();
    public function getPlaylists();
    public function getPlaylistsById(int $id);
    public function getRadios();
    public function getTracks();
    public function getRecommendationsAlbums();
    public function getRecommendationsReleases();
    public function getRecommendationsArtists();
    public function getRecommendationsPlaylists();
    public function getRecommendationsTracks();
    public function getRecommendationsRadios();
    public function getChartsTracks();
    public function getChartsAlbums();
    public function getChartsPlaylists();
    public function getChartsArtists();
    public function addAlbum(int $albumId): bool;
    public function removeAlbum(int $albumId): bool;
    public function followArtist(int $artistId): bool;
    public function unfollowArtist(int $artistId): bool;
    public function followUser(int $userId): bool;
    public function unfollowUser(int $userId): bool;
    public function addTrack(int $trackId): bool;
    public function removeTrack(int $trackId): bool;
    public function addRadio(int $radioId): bool;
    public function removeRadio(int $radioId): bool;
    public function createPlaylist(string $title);
}
