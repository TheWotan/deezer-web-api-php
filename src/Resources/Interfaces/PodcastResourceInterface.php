<?php

declare(strict_types=1);

namespace Deezer\Resources\Interfaces;

use Deezer\Resources\ResourceInterface;
use Deezer\Types;

/**
 * @phpstan-import-type PodcastObject from Types
 * @phpstan-import-type Paginated from Types
 */
interface PodcastResourceInterface extends ResourceInterface
{
    /**
     * @auth required
     * @param int $id - The podcast deezer ID
     * @return PodcastObject
     */
    public function get(int $id): object;
    /**
     * @auth required
     * @param int $id - The podcast deezer ID
     * @return Paginated
     */
    public function getEpisodes(int $id): object;
}
