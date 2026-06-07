<?php

declare(strict_types=1);

namespace Deezer\Resources\Interfaces;

use Deezer\Resources\ResourceInterface;

interface CommentResourceInterface extends ResourceInterface
{
    public function get(int $id);
    public function delete(int $id): bool;
}
