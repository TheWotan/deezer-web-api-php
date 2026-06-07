<?php

declare(strict_types=1);

namespace Deezer\Resources\Interfaces;

use Deezer\Resources\ResourceInterface;

interface PlaylistResourceInterface extends ResourceInterface
{
    public function get(int $id);
    public function getComments(int $id);
    public function getFans(int $id);
    public function getTracks(int $id);
    public function getRadio(int $id);
    public function create(int $userId, string $title);
    public function delete(int $id): bool;
    public function addTracks(int $id, array $trackIds): bool;
    public function removeTracks(int $id, array $trackIds): bool;
}
