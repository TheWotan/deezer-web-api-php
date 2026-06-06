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
     * @param int $id - The playlist deezer ID
     * @return array|object An playlist object
     * @throws DeezerAPIException
     */
    public function get(int $id)
    {
        $response = $this->api->sendRequest('GET', "/playlist/$id");

        return $response['body'];
    }

    /**
     * Return a list of playlist's comments. Represented by an array of Comment objects
     * https://developers.deezer.com/api/playlist/comments
     *
     * @param int $id - The playlist deezer ID
     * @return array|object A list of object of type comment
     * @throws DeezerAPIException
     */
    public function getComments(int $id)
    {
        $response = $this->api->sendRequest('GET', "/playlist/$id/comments");

        return $response['body'];
    }

    /**
     * Return a list of playlist's fans. Represented by an array of User objects
     * https://developers.deezer.com/api/playlist/fans
     *
     * @param int $id - The playlist deezer ID
     * @return array|object A list of object of type user
     * @throws DeezerAPIException
     */
    public function getFans(int $id)
    {
        $response = $this->api->sendRequest('GET', "/playlist/$id/fans");

        return $response['body'];
    }

    /**
     * Return a list of playlist's tracks. Represented by an array of Track object
     * https://developers.deezer.com/api/playlist/tracks
     *
     * @param int $id - The playlist deezer ID
     * @return array|object A list of object of type track
     * @throws DeezerAPIException
     */
    public function getTracks(int $id)
    {
        $response = $this->api->sendRequest('GET', "/playlist/$id/tracks");

        return $response['body'];
    }

    /**
     * Return a list of playlist's recommendation tracks. Represented by an array of Track object
     * https://developers.deezer.com/api/playlist/tracks
     *
     * @param int $id - The playlist deezer ID
     * @return array|object A list of object of type track
     * @throws DeezerAPIException
     */
    public function getRadio(int $id)
    {
        $response = $this->api->sendRequest('GET', "/playlist/$id/radio");

        return $response['body'];
    }

    /**
     * Create a playlist for a user
     * https://developers.deezer.com/api/user/playlists
     *
     * @param int $userId - The user's Deezer id
     * @param string $title - The playlist title
     * @return array|object A playlist object
     * @throws DeezerAPIException
     */
    public function create(int $userId, string $title)
    {
        $response = $this->api->sendRequest('POST', "/user/$userId/playlists", ['title' => $title]);

        return $response['body'];
    }

    /**
     * Delete a playlist
     * https://developers.deezer.com/api/playlist
     *
     * @param int $id - The playlist deezer ID
     * @return bool True if deleted
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
     * @param int $id - The playlist deezer ID
     * @param array $trackIds - Array of track IDs to add
     * @return bool True if successful
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
     * @param int $id - The playlist deezer ID
     * @param array $trackIds - Array of track IDs to remove
     * @return bool True if successful
     * @throws DeezerAPIException
     */
    public function removeTracks(int $id, array $trackIds): bool
    {
        $response = $this->api->sendRequest('DELETE', "/playlist/$id/tracks", ['songs' => implode(',', $trackIds)]);

        return (bool) $response['body'];
    }
}
