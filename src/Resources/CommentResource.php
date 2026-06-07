<?php

declare(strict_types=1);

namespace Deezer\Resources;

use Deezer\DeezerAPIException;
use Deezer\Resources\Interfaces\CommentResourceInterface;

/**
 * Class CommentResource
 * @package Deezer\Resources
 */
class CommentResource extends AbstractResource implements CommentResourceInterface
{
    /**
     * Get a comment object
     * https://developers.deezer.com/api/comment
     *
     * @auth none
     * @param int $id - The comment's Deezer id
     * @return object{
     *   id: int, text: string, date: int,
     *   author: object{id: int, name: string, tracklist: string, type: string},
     *   type: string
     * }
     * @throws DeezerAPIException
     */
    public function get(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/comment/$id");
        return $response['body'];
    }

    /**
     * Delete a comment
     * https://developers.deezer.com/api/comment
     *
     * @auth required
     * @param int $id - The comment's Deezer id
     * @return bool
     * @throws DeezerAPIException
     */
    public function delete(int $id): bool
    {
        $this->api->sendRequest('DELETE', "/comment/$id");
        return true;
    }
}
