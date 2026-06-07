<?php

namespace Deezer\Resources;

use Deezer\DeezerAPIException;
use Deezer\Resources\Interfaces\EditorialResourceInterface;
use Deezer\Types;

/**
 * Class EditorialResource
 * @package Deezer\Resources
 *
 * @phpstan-import-type EditorialObject from Types
 * @phpstan-import-type Paginated from Types
 */
class EditorialResource extends AbstractResource implements EditorialResourceInterface
{
    /**
     * Get An list of editorial objects
     * https://developers.deezer.com/api/editorial
     *
     * @auth none
     * @return object{data: EditorialObject[], total: int}
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
     * @return EditorialObject
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
     * @return Paginated
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
     * @return Paginated
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
     * @return Paginated
     * @throws DeezerAPIException
     */
    public function getReleases(int $id): object
    {
        $response = $this->api->sendRequest('GET', "/editorial/$id/releases");

        return $response['body'];
    }
}
