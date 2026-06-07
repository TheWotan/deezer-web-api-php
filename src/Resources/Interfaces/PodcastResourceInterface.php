<?php

declare(strict_types=1);

namespace Deezer\Resources\Interfaces;

use Deezer\Resources\ResourceInterface;

/**
 * Interface PodcastResourceInterface
 */
interface PodcastResourceInterface extends ResourceInterface
{
    /**
     * @auth required
     * @param int $id - The podcast deezer ID
     * @return object{
     *   id: int, title: string, description: string, available: bool,
     *   rating: int, fans: int, link: string, share: string,
     *   picture: string, picture_small: string, picture_medium: string,
     *   picture_big: string, picture_xl: string,
     *   md5_image: string, type: string
     * }
     */
    public function get(int $id): object;
    /**
     * @auth required
     * @param int $id - The podcast deezer ID
     * @return object{data: object[], total: int, next: string|null}
     */
    public function getEpisodes(int $id): object;
}
