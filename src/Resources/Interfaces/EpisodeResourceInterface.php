<?php

declare(strict_types=1);

namespace Deezer\Resources\Interfaces;

use Deezer\Resources\ResourceInterface;

/**
 * Interface EpisodeResourceInterface
 */
interface EpisodeResourceInterface extends ResourceInterface
{
    /**
     * @auth required
     * @param int $id - The episode deezer ID
     * @return object{
     *   id: int, title: string, description: string, available: bool,
     *   release_date: string, duration: int, link: string, share: string,
     *   picture: string, picture_small: string, picture_medium: string,
     *   picture_big: string, picture_xl: string, md5_image: string,
     *   podcast: object{id: int, title: string, type: string}, type: string
     * }
     */
    public function get(int $id): object;
}
