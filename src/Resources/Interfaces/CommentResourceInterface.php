<?php

declare(strict_types=1);

namespace Deezer\Resources\Interfaces;

use Deezer\Resources\ResourceInterface;

/**
 * Interface CommentResourceInterface
 */
interface CommentResourceInterface extends ResourceInterface
{
    /**
     * @auth none
     * @param int $id - The comment's Deezer id
     * @return object{
     *   id: int, text: string, date: int,
     *   author: object{id: int, name: string, tracklist: string, type: string},
     *   type: string
     * }
     */
    public function get(int $id): object;
    /**
     * @auth required
     * @param int $id - The comment's Deezer id
     * @return bool
     */
    public function delete(int $id): bool;
}
