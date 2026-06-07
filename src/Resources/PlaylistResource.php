<?php

namespace Deezer\Resources;

use Deezer\DeezerAPIException;
use Deezer\Resources\Interfaces\PlaylistResourceInterface;

/**
 * Class PlaylistResource
 * @package Deezer\Resources
 */
class PlaylistResource extends AbstractResource implements PlaylistResourceInterface
{
    /**
     * Get An playlist object
     * https://developers.deezer.com/api/playlist
     *
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
     * @throws DeezerAPIException
     */
    public function get(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/playlist/$id");

        return $response['body'];
    }

    /**
     * Return a list of playlist's comments. Represented by an array of Comment objects
     * https://developers.deezer.com/api/playlist/comments
     *
     * @auth none
     * @param int $id - The playlist deezer ID
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getComments(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/playlist/$id/comments");

        return $response['body'];
    }

    /**
     * Return a list of playlist's fans. Represented by an array of User objects
     * https://developers.deezer.com/api/playlist/fans
     *
     * @auth none
     * @param int $id - The playlist deezer ID
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getFans(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/playlist/$id/fans");

        return $response['body'];
    }

    /**
     * Return a list of playlist's tracks. Represented by an array of Track object
     * https://developers.deezer.com/api/playlist/tracks
     *
     * @auth none
     * @param int $id - The playlist deezer ID
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getTracks(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/playlist/$id/tracks");

        return $response['body'];
    }

    /**
     * Return a list of playlist's recommendation tracks. Represented by an array of Track object
     * https://developers.deezer.com/api/playlist/tracks
     *
     * @auth none
     * @param int $id - The playlist deezer ID
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getRadio(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/playlist/$id/radio");

        return $response['body'];
    }

    /**
     * Create a playlist for a user
     * https://developers.deezer.com/api/user/playlists
     *
     * @auth required
     * @param int $userId - The user's Deezer id
     * @param string $title - The playlist title
     * @return object{id: int}
     * @throws DeezerAPIException
     */
    public function create(int $userId, string $title): object
    {
        $response = $this->api->sendRequest('POST', "/user/$userId/playlists", ['title' => $title]);

        return $response['body'];
    }

    /**
     * Delete a playlist
     * https://developers.deezer.com/api/playlist
     *
     * @auth required
     * @param int $id - The playlist deezer ID
     * @return bool
     * @throws DeezerAPIException
     */
    public function delete(int $id): bool
    {
        $response = $this->api->sendRequest('DELETE', "/playlist/$id");

        return (bool) $response['body'];
    }

    /**
     * Add tracks to a playlist
     * https://developers.deezer.com/api/playlist/tracks
     *
     * @auth required
     * @param int $id - The playlist deezer ID
     * @param array $trackIds - Array of track IDs to add
     * @return bool
     * @throws DeezerAPIException
     */
    public function addTracks(int $id, array $trackIds): bool
    {
        $response = $this->api->sendRequest('POST', "/playlist/$id/tracks", ['songs' => implode(',', $trackIds)]);

        return (bool) $response['body'];
    }

    /**
     * Remove tracks from a playlist
     * https://developers.deezer.com/api/playlist/tracks
     *
     * @auth required
     * @param int $id - The playlist deezer ID
     * @param array $trackIds - Array of track IDs to remove
     * @return bool
     * @throws DeezerAPIException
     */
    public function removeTracks(int $id, array $trackIds): bool
    {
        $response = $this->api->sendRequest('DELETE', "/playlist/$id/tracks", ['songs' => implode(',', $trackIds)]);

        return (bool) $response['body'];
    }
}
