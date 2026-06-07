<?php

declare(strict_types=1);

namespace Deezer\Resources\Interfaces;

use Deezer\Resources\ResourceInterface;

interface EditorialResourceInterface extends ResourceInterface
{
    public function list();
    public function get(int $id);
    public function getSelection(int $id);
    public function getCharts(int $id);
    public function getReleases(int $id);
}
