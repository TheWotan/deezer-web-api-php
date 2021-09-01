<?php

declare(strict_types=1);

use Deezer\DeezerAPIException;

require_once __DIR__ . "/AbstractResourceTest.php";

class EditorialResourceTest extends AbstractResourceTest
{
    private const ID = 0;

    /**
     * @throws DeezerAPIException
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

        $this->assertObjectHasAttribute("id", $response);
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

        $this->assertObjectHasAttribute("data", $response);
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

        $this->assertObjectHasAttribute("artists", $response);
        foreach ($response->artists->data as $datum) {
            $this->assertEquals("artist", $datum->type);
        }
        $this->assertObjectHasAttribute("tracks", $response);
        foreach ($response->tracks->data as $datum) {
            $this->assertEquals("track", $datum->type);
        }
        $this->assertObjectHasAttribute("albums", $response);
        foreach ($response->albums->data as $datum) {
            $this->assertEquals("album", $datum->type);
        }
        $this->assertObjectHasAttribute("playlists", $response);
        foreach ($response->playlists->data as $datum) {
            $this->assertEquals("playlist", $datum->type);
        }
        $this->assertObjectHasAttribute("podcasts", $response);
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

        $this->assertObjectHasAttribute("data", $response);
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

        $this->assertObjectHasAttribute("data", $response);
        foreach ($response->data as $datum) {
            $this->assertEquals("album", $datum->type);
        }
    }
}
