<?php

declare(strict_types=1);

namespace Deezer\Resources\Interfaces;

use Deezer\Resources\ResourceInterface;

interface AlbumResourceInterface extends ResourceInterface
{
    public function get(int $id);
    public function getComments(int $id);
    public function getFans(int $id);
    public function getTracks(int $id);
}
