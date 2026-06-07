<?php

declare(strict_types=1);

namespace Deezer\Tests\Resources;

use Deezer\DeezerAPIException;

class EditorialResourceTest extends AbstractResourceTest
{
    private const ID = 0;

    /**
     * @throws DeezerAPIException
     * @group real-api
     */
    public function testRealGet()
    {
        $response = $this->apiReal->editorial->get(self::ID);

        $this->assertEquals(self::ID, $response->id);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGet()
    {
        $api = $this->setupApi(
            "GET",
            "/editorial/" . self::ID,
            [],
            [],
            "editorial/view"
        );

        $response = $api->editorial->get(self::ID);

        $this->assertObjectHasProperty("id", $response);
        $this->assertEquals("editorial", $response->type);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testList()
    {
        $api = $this->setupApi(
            "GET",
            "/editorial",
            [],
            [],
            "editorial/index"
        );

        $response = $api->editorial->list();

        $this->assertObjectHasProperty("data", $response);
        foreach ($response->data as $datum) {
            $this->assertEquals("editorial", $datum->type);
        }
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGetCharts()
    {
        $api = $this->setupApi(
            "GET",
            "/editorial/" . self::ID . "/charts",
            [],
            [],
            "editorial/charts"
        );

        $response = $api->editorial->getCharts(self::ID);

        $this->assertObjectHasProperty("artists", $response);
        foreach ($response->artists->data as $datum) {
            $this->assertEquals("artist", $datum->type);
        }
        $this->assertObjectHasProperty("tracks", $response);
        foreach ($response->tracks->data as $datum) {
            $this->assertEquals("track", $datum->type);
        }
        $this->assertObjectHasProperty("albums", $response);
        foreach ($response->albums->data as $datum) {
            $this->assertEquals("album", $datum->type);
        }
        $this->assertObjectHasProperty("playlists", $response);
        foreach ($response->playlists->data as $datum) {
            $this->assertEquals("playlist", $datum->type);
        }
        $this->assertObjectHasProperty("podcasts", $response);
        foreach ($response->podcasts->data as $datum) {
            $this->assertEquals("podcast", $datum->type);
        }
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGetSelection()
    {
        $api = $this->setupApi(
            "GET",
            "/editorial/" . self::ID . "/selection",
            [],
            [],
            "editorial/selection"
        );

        $response = $api->editorial->getSelection(self::ID);

        $this->assertObjectHasProperty("data", $response);
        foreach ($response->data as $datum) {
            $this->assertEquals("album", $datum->type);
        }
    }

    /**
     * @throws DeezerAPIException
     */
    public function testGetReleases()
    {
        $api = $this->setupApi(
            "GET",
            "/editorial/" . self::ID . "/releases",
            [],
            [],
            "editorial/releases"
        );

        $response = $api->editorial->getReleases(self::ID);

        $this->assertObjectHasProperty("data", $response);
        foreach ($response->data as $datum) {
            $this->assertEquals("album", $datum->type);
        }
    }
}
