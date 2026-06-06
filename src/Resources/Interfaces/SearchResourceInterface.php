<?php

declare(strict_types=1);

namespace Deezer\Resources\Interfaces;

use Deezer\Resources\ResourceInterface;

interface SearchResourceInterface extends ResourceInterface
{
    public function search(string $query);
    public function track(string $query);
    public function album(string $query);
    public function artist(string $query);
    public function playlist(string $query);
    public function radio(string $query);
    public function user(string $query);
    public function podcast(string $query);
    public function history(string $query);
}
