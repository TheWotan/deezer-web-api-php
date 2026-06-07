<?php

declare(strict_types=1);

namespace Deezer\Resources\Interfaces;

use Deezer\Resources\ResourceInterface;

/**
 * Interface SearchResourceInterface
 */
interface SearchResourceInterface extends ResourceInterface
{
    /**
     * @auth none
     * @param string $query - Search query
     * @return object{data: object[], total: int, next: string|null}
     */
    public function search(string $query): object;
    /**
     * @auth none
     * @param string $query - Search query
     * @return object{data: object[], total: int, next: string|null}
     */
    public function track(string $query): object;
    /**
     * @auth none
     * @param string $query - Search query
     * @return object{data: object[], total: int, next: string|null}
     */
    public function album(string $query): object;
    /**
     * @auth none
     * @param string $query - Search query
     * @return object{data: object[], total: int, next: string|null}
     */
    public function artist(string $query): object;
    /**
     * @auth none
     * @param string $query - Search query
     * @return object{data: object[], total: int, next: string|null}
     */
    public function playlist(string $query): object;
    /**
     * @auth none
     * @param string $query - Search query
     * @return object{data: object[], total: int, next: string|null}
     */
    public function radio(string $query): object;
    /**
     * @auth none
     * @param string $query - Search query
     * @return object{data: object[], total: int, next: string|null}
     */
    public function user(string $query): object;
    /**
     * @auth none
     * @param string $query - Search query
     * @return object{data: object[], total: int, next: string|null}
     */
    public function podcast(string $query): object;
    /**
     * @auth required
     * @param string $query - Search query
     * @return object{data: object[], total: int, next: string|null}
     */
    public function history(string $query): object;
}
