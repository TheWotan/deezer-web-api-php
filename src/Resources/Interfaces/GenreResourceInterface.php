<?php

declare(strict_types=1);

namespace Deezer\Resources\Interfaces;

use Deezer\Resources\ResourceInterface;

interface GenreResourceInterface extends ResourceInterface
{
    public function list();
    public function get(int $id);
    public function getPodcasts(int $id);
    public function getArtists(int $id);
    public function getRadios(int $id);
}
