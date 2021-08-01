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
        $this->assertObjectHasAttribute("tracks", $response);
        $this->assertObjectHasAttribute("albums", $response);
        $this->assertObjectHasAttribute("playlists", $response);
        $this->assertObjectHasAttribute("podcasts", $response);
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
    }
}
