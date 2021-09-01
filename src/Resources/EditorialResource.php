<?php

namespace Deezer\Resources;

use Deezer\DeezerAPIException;

/**
 * Class EditorialResource
 * @package Deezer\Resources
 */
class EditorialResource extends AbstractResource
{
    /**
     * Get An list of editorial objects
     * https://developers.deezer.com/api/editorial
     *
     * @return array|object A list of object of type editorial
     * @throws DeezerAPIException
     */
    public function list()
    {
        $response = $this->api->sendRequest('GET', "/editorial");

        return $response['body'];
    }

    /**
     * Get An editorial object
     * https://developers.deezer.com/api/editorial
     *
     * @param int $id - The editorial's Deezer id
     * @return array|object An editorial object
     * @throws DeezerAPIException
     */
    public function get(int $id)
    {
        $response = $this->api->sendRequest('GET', "/editorial/$id");

        return $response['body'];
    }

    /**
     * Return a list of albums selected every week by the Deezer Team.
     * https://developers.deezer.com/api/editorial/selection
     *
     * @param int $id - The editorial's Deezer id
     * @return array|object A list of object of type album
     * @throws DeezerAPIException
     */
    public function getSelection(int $id)
    {
        $response = $this->api->sendRequest('GET', "/editorial/$id/selection");

        return $response['body'];
    }

    /**
     * This method returns five lists : Top track, Top album, Top artist, Top playlist and Top podcasts.
     * https://developers.deezer.com/api/editorial/charts
     *
     * @param int $id - The editorial's Deezer id
     * @return array|object A five lists of object of type: track, album, artist, playlist, podcast
     * @throws DeezerAPIException
     */
    public function getCharts(int $id)
    {
        $response = $this->api->sendRequest('GET', "/editorial/$id/charts");

        return $response['body'];
    }

    /**
     * This method returns the new releases per genre for the current country
     * https://developers.deezer.com/api/editorial/releases
     *
     * @param int $id - The editorial's Deezer id
     * @return array|object A list of object of type album
     * @throws DeezerAPIException
     */
    public function getReleases(int $id)
    {
        $response = $this->api->sendRequest('GET', "/editorial/$id/releases");

        return $response['body'];
    }
}
