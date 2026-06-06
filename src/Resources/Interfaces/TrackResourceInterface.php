<?php

declare(strict_types=1);

namespace Deezer\Resources\Interfaces;

use Deezer\Resources\ResourceInterface;

interface TrackResourceInterface extends ResourceInterface
{
    public function get(int $id);
}
