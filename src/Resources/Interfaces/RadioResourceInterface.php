<?php

declare(strict_types=1);

namespace Deezer\Resources\Interfaces;

use Deezer\Resources\ResourceInterface;

interface RadioResourceInterface extends ResourceInterface
{
    public function list();
    public function get(int $id);
    public function getGenres();
    public function getTop();
    public function getLists();
    public function getTracks(int $id);
}
