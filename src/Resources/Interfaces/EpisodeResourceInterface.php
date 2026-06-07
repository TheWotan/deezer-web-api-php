<?php

declare(strict_types=1);

namespace Deezer\Resources\Interfaces;

use Deezer\Resources\ResourceInterface;
use Deezer\Types;

/**
 * @phpstan-import-type EpisodeObject from Types
 */
interface EpisodeResourceInterface extends ResourceInterface
{
    /**
     * @auth required
     * @param int $id - The episode deezer ID
     * @return EpisodeObject
     */
    public function get(int $id): object;
}
