<?php

namespace Deezer\Resources;

use Deezer\DeezerAPIException;
use Deezer\Resources\Interfaces\SearchResourceInterface;
use Deezer\Types;

/**
 * Class SearchResource
 * @package Deezer\Resources
 *
 * @phpstan-import-type Paginated from Types
 */
class SearchResource extends AbstractResource implements SearchResourceInterface
{
    /**
     * Search tracks
     * https://developers.deezer.com/api/search
     *
     * @auth none
     * @param string $query - Search query
     * @return Paginated
     * @throws DeezerAPIException
     */
    public function search(string $query): object
    {
        $response = $this->api->sendRequest('GET', "/search", ['q' => $query]);

        return $response['body'];
    }

    /**
     * Search tracks
     * https://developers.deezer.com/api/search/tracks
     *
     * @auth none
     * @param string $query - Search query
     * @return Paginated
     * @throws DeezerAPIException
     */
    public function track(string $query): object
    {
        $response = $this->api->sendRequest('GET', "/search/track", ['q' => $query]);

        return $response['body'];
    }

    /**
     * Search albums.
     * https://developers.deezer.com/api/search/album
     *
     * @auth none
     * @param string $query - Search query
     * @return Paginated
     * @throws DeezerAPIException
     */
    public function album(string $query): object
    {
        $response = $this->api->sendRequest('GET', "/search/album", ['q' => $query]);

        return $response['body'];
    }

    /**
     * Search artists.
     * https://developers.deezer.com/api/search/artist
     *
     * @auth none
     * @param string $query - Search query
     * @return Paginated
     * @throws DeezerAPIException
     */
    public function artist(string $query): object
    {
        $response = $this->api->sendRequest('GET', "/search/artist", ['q' => $query]);

        return $response['body'];
    }

    /**
     * Search playlists.
     * https://developers.deezer.com/api/search/playlist
     *
     * @auth none
     * @param string $query - Search query
     * @return Paginated
     * @throws DeezerAPIException
     */
    public function playlist(string $query): object
    {
        $response = $this->api->sendRequest('GET', "/search/playlist", ['q' => $query]);

        return $response['body'];
    }

    /**
     * Search radios.
     * https://developers.deezer.com/api/search/radio
     *
     * @auth none
     * @param string $query - Search query
     * @return Paginated
     * @throws DeezerAPIException
     */
    public function radio(string $query): object
    {
        $response = $this->api->sendRequest('GET', "/search/radio", ['q' => $query]);

        return $response['body'];
    }

    /**
     * Search users.
     * https://developers.deezer.com/api/search/user
     *
     * @auth none
     * @param string $query - Search query
     * @return Paginated
     * @throws DeezerAPIException
     */
    public function user(string $query): object
    {
        $response = $this->api->sendRequest('GET', "/search/user", ['q' => $query]);

        return $response['body'];
    }

    /**
     * Search podcasts.
     * https://developers.deezer.com/api/search/podcast
     *
     * @auth none
     * @param string $query - Search query
     * @return Paginated
     * @throws DeezerAPIException
     */
    public function podcast(string $query): object
    {
        $response = $this->api->sendRequest('GET', "/search/podcast", ['q' => $query]);

        return $response['body'];
    }

    /**
     * Get user search history.
     * https://developers.deezer.com/api/search/history
     *
     * @auth required
     * @param string $query - Search query
     * @return Paginated
     * @throws DeezerAPIException
     */
    public function history(string $query): object
    {
        $response = $this->api->sendRequest('GET', "/search/history", ['q' => $query]);

        return $response['body'];
    }
}
