<?php

declare(strict_types=1);

namespace Deezer\Resources\Interfaces;

use Deezer\Resources\ResourceInterface;
use Deezer\Types;

/**
 * @phpstan-import-type TrackObject from Types
 */
interface TrackResourceInterface extends ResourceInterface
{
    /**
     * @auth none
     * @param int $id - The track's Deezer id
     * @return TrackObject
     */
    public function get(int $id): object;
}
