<?php

namespace Deezer\Resources;

use Deezer\DeezerAPIException;
use Deezer\Resources\Interfaces\AlbumResourceInterface;

/**
 * Class AlbumResource
 * @package Deezer\Resources
 */
class AlbumResource extends AbstractResource implements AlbumResourceInterface
{
    /**
     * Get An album object
     * https://developers.deezer.com/api/album
     *
     * @auth none
     * @param int $id - The album's Deezer id
     * @return object{
     *   id: int, title: string, upc: string, link: string, share: string,
     *   cover: string, cover_small: string, cover_medium: string,
     *   cover_big: string, cover_xl: string, md5_image: string,
     *   genre_id: int, genres: object{data: object[]},
     *   label: string, nb_tracks: int, duration: int, fans: int,
     *   release_date: string, record_type: string, available: bool,
     *   tracklist: string, explicit_lyrics: bool,
     *   explicit_content_lyrics: int, explicit_content_cover: int,
     *   contributors: object[], artist: object{id: int, name: string, type: string},
     *   type: string, tracks: object{data: object[], checksum: string}
     * }
     * @throws DeezerAPIException
     */
    public function get(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/album/$id");

        return $response['body'];
    }

    /**
     * Return a list of album's comments. Represented by an array of Comment objects
     * https://developers.deezer.com/api/album/comments
     *
     * @auth none
     * @param int $id - The album's Deezer id
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getComments(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/album/$id/comments");

        return $response['body'];
    }

    /**
     * Return a list of album's fans. Represented by an array of User objects
     * https://developers.deezer.com/api/album/fans
     *
     * @auth none
     * @param int $id - The album's Deezer id
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getFans(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/album/$id/fans");

        return $response['body'];
    }

    /**
     * Return a list of album's tracks. Represented by an array of Track objects
     * https://developers.deezer.com/api/album/tracks
     *
     * @auth none
     * @param int $id - The album's Deezer id
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getTracks(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/album/$id/tracks");

        return $response['body'];
    }
}
