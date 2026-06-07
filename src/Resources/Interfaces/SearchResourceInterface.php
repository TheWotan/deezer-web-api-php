<?php

declare(strict_types=1);

namespace Deezer\Resources\Interfaces;

use Deezer\Resources\ResourceInterface;
use Deezer\Types;

/**
 * @phpstan-import-type Paginated from Types
 */
interface SearchResourceInterface extends ResourceInterface
{
    /**
     * @auth none
     * @param string $query - Search query
     * @return Paginated
     */
    public function search(string $query): object;
    /**
     * @auth none
     * @param string $query - Search query
     * @return Paginated
     */
    public function track(string $query): object;
    /**
     * @auth none
     * @param string $query - Search query
     * @return Paginated
     */
    public function album(string $query): object;
    /**
     * @auth none
     * @param string $query - Search query
     * @return Paginated
     */
    public function artist(string $query): object;
    /**
     * @auth none
     * @param string $query - Search query
     * @return Paginated
     */
    public function playlist(string $query): object;
    /**
     * @auth none
     * @param string $query - Search query
     * @return Paginated
     */
    public function radio(string $query): object;
    /**
     * @auth none
     * @param string $query - Search query
     * @return Paginated
     */
    public function user(string $query): object;
    /**
     * @auth none
     * @param string $query - Search query
     * @return Paginated
     */
    public function podcast(string $query): object;
    /**
     * @auth required
     * @param string $query - Search query
     * @return Paginated
     */
    public function history(string $query): object;
}
