<?php

declare(strict_types=1);

namespace Deezer\Resources\Interfaces;

use Deezer\Resources\ResourceInterface;
use Deezer\Types;

/**
 * @phpstan-import-type RadioObject from Types
 * @phpstan-import-type Paginated from Types
 */
interface RadioResourceInterface extends ResourceInterface
{
    /**
     * @auth none
     * @return Paginated
     */
    public function list(): object;
    /**
     * @auth none
     * @param int $id - The radio deezer ID
     * @return RadioObject
     */
    public function get(int $id): object;
    /**
     * @auth none
     * @return Paginated
     */
    public function getGenres(): object;
    /**
     * @auth none
     * @return Paginated
     */
    public function getTop(): object;
    /**
     * @auth none
     * @return Paginated
     */
    public function getLists(): object;
    /**
     * @auth none
     * @param int $id - The radio deezer ID
     * @return Paginated
     */
    public function getTracks(int $id): object;
}
