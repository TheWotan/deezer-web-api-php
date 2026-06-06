<?php

declare(strict_types=1);

namespace Deezer\Resources\Interfaces;

use Deezer\Resources\ResourceInterface;

interface PodcastResourceInterface extends ResourceInterface
{
    public function get(int $id);
    public function getEpisodes(int $id);
}
