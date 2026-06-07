<?php

namespace Deezer\Resources;

use Deezer\DeezerAPIException;
use Deezer\Resources\Interfaces\EditorialResourceInterface;

/**
 * Class EditorialResource
 * @package Deezer\Resources
 */
class EditorialResource extends AbstractResource implements EditorialResourceInterface
{
    /**
     * Get An list of editorial objects
     * https://developers.deezer.com/api/editorial
     *
     * @auth none
     * @return object{data: object[], total: int}
     * @throws DeezerAPIException
     */
    public function list(): object
    {
        $response = $this->api->sendRequest('GET', "/editorial");

        return $response['body'];
    }

    /**
     * Get An editorial object
     * https://developers.deezer.com/api/editorial
     *
     * @auth none
     * @param int $id - The editorial's Deezer id
     * @return object{
     *   id: int, name: string,
     *   picture: string, picture_small: string, picture_medium: string,
     *   picture_big: string, picture_xl: string, type: string
     * }
     * @throws DeezerAPIException
     */
    public function get(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/editorial/$id");

        return $response['body'];
    }

    /**
     * Return a list of albums selected every week by the Deezer Team.
     * https://developers.deezer.com/api/editorial/selection
     *
     * @auth none
     * @param int $id - The editorial's Deezer id
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getSelection(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/editorial/$id/selection");

        return $response['body'];
    }

    /**
     * This method returns five lists : Top track, Top album, Top artist, Top playlist and Top podcasts.
     * https://developers.deezer.com/api/editorial/charts
     *
     * @auth none
     * @param int $id - The editorial's Deezer id
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getCharts(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/editorial/$id/charts");

        return $response['body'];
    }

    /**
     * This method returns the new releases per genre for the current country
     * https://developers.deezer.com/api/editorial/releases
     *
     * @auth none
     * @param int $id - The editorial's Deezer id
     * @return object{data: object[], total: int, next: string|null}
     * @throws DeezerAPIException
     */
    public function getReleases(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/editorial/$id/releases");

        return $response['body'];
    }
}
