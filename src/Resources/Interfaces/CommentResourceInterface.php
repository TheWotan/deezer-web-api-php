<?php

declare(strict_types=1);

namespace Deezer\Resources\Interfaces;

use Deezer\Resources\ResourceInterface;
use Deezer\Types;

/**
 * @phpstan-import-type CommentObject from Types
 */
interface CommentResourceInterface extends ResourceInterface
{
    /**
     * @auth none
     * @param int $id - The comment's Deezer id
     * @return CommentObject
     */
    public function get(int $id): object;
    /**
     * @auth required
     * @param int $id - The comment's Deezer id
     * @return bool
     */
    public function delete(int $id): bool;
}
