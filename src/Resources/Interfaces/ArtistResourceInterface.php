<?php

declare(strict_types=1);

namespace Deezer\Resources\Interfaces;

use Deezer\Resources\ResourceInterface;

interface ArtistResourceInterface extends ResourceInterface
{
    public function get(int $id);
    public function getTop(int $id);
    public function getAlbums(int $id);
    public function getComments(int $id);
    public function getFans(int $id);
    public function getRelated(int $id);
    public function getRadio(int $id);
    public function getPlaylists(int $id);
}
