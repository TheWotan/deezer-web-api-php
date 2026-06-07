<?php

declare(strict_types=1);

namespace Deezer\Resources\Interfaces;

use Deezer\Resources\ResourceInterface;
use Deezer\Types;

/**
 * @phpstan-import-type EditorialObject from Types
 * @phpstan-import-type Paginated from Types
 */
interface EditorialResourceInterface extends ResourceInterface
{
    /**
     * @auth none
     * @return object{data: EditorialObject[], total: int}
     */
    public function list(): object;
    /**
     * @auth none
     * @param int $id - The editorial's Deezer id
     * @return EditorialObject
     */
    public function get(int $id): object;
    /**
     * @auth none
     * @param int $id - The editorial's Deezer id
     * @return Paginated
     */
    public function getSelection(int $id): object;
    /**
     * @auth none
     * @param int $id - The editorial's Deezer id
     * @return Paginated
     */
    public function getCharts(int $id): object;
    /**
     * @auth none
     * @param int $id - The editorial's Deezer id
     * @return Paginated
     */
    public function getReleases(int $id): object;
}
