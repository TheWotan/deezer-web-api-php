<?php

declare(strict_types=1);

namespace Deezer\Resources\Interfaces;

use Deezer\Resources\ResourceInterface;

interface ChartResourceInterface extends ResourceInterface
{
    public function get(int $id);
    public function getTracks(int $id);
    public function getAlbums(int $id);
    public function getArtists(int $id);
    public function getPlaylists(int $id);
    public function getPodcasts(int $id);
}
