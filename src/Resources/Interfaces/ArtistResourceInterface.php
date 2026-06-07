<?php

declare(strict_types=1);

namespace Deezer\Resources\Interfaces;

use Deezer\Resources\ResourceInterface;

/**
 * Interface ArtistResourceInterface
 */
interface ArtistResourceInterface extends ResourceInterface
{
    /**
     * @auth none
     * @param int $id - The artist's Deezer id
     * @return object{
     *   id: int, name: string, link: string, share: string,
     *   picture: string, picture_small: string, picture_medium: string,
     *   picture_big: string, picture_xl: string,
     *   nb_album: int, nb_fan: int, radio: bool,
     *   tracklist: string, type: string
     * }
     */
    public function get(int $id): object;
    /**
     * @auth none
     * @param int $id - The artist's Deezer id
     * @return object{data: object[], total: int, next: string|null}
     */
    public function getTop(int $id): object;
    /**
     * @auth none
     * @param int $id - The artist's Deezer id
     * @return object{data: object[], total: int, next: string|null}
     */
    public function getAlbums(int $id): object;
    /**
     * @auth none
     * @param int $id - The artist's Deezer id
     * @return object{data: object[], total: int, next: string|null}
     */
    public function getComments(int $id): object;
    /**
     * @auth none
     * @param int $id - The artist's Deezer id
     * @return object{data: object[], total: int, next: string|null}
     */
    public function getFans(int $id): object;
    /**
     * @auth none
     * @param int $id - The artist's Deezer id
     * @return object{data: object[], total: int, next: string|null}
     */
    public function getRelated(int $id): object;
    /**
     * @auth none
     * @param int $id - The artist's Deezer id
     * @return object{data: object[], total: int, next: string|null}
     */
    public function getRadio(int $id): object;
    /**
     * @auth none
     * @param int $id - The artist's Deezer id
     * @return object{data: object[], total: int, next: string|null}
     */
    public function getPlaylists(int $id): object;
}
