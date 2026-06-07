<?php

declare(strict_types=1);

namespace Deezer\Resources;

use Deezer\DeezerAPIException;
use Deezer\Resources\Interfaces\CommentResourceInterface;

class CommentResource extends AbstractResource implements CommentResourceInterface
{
    /**
     * Get a comment object
     * https://developers.deezer.com/api/comment
     *
     * @throws DeezerAPIException
     */
    public function get(int $id)
    {
        $response = $this->api->sendRequest('GET', "/comment/$id");
        return $response['body'];
    }

    /**
     * Delete a comment
     * https://developers.deezer.com/api/comment
     *
     * @throws DeezerAPIException
     */
    public function delete(int $id): bool
    {
        $this->api->sendRequest('DELETE', "/comment/$id");
        return true;
    }
}
