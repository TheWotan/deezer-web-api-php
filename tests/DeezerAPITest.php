<?php

declare(strict_types=1);

use Deezer\DeezerAPI;
use Deezer\DeezerAPIException;
use Deezer\Request;

class DeezerAPITest extends PHPUnit\Framework\TestCase
{
    protected $apiReal;

    protected function setUp(): void
    {
        $this->apiReal = new Deezer\DeezerAPI([], null);
    }

    protected function setupStub($expectedMethod, $expectedUri, $expectedParameters, $expectedHeaders, $fixtureName)
    {
        $stub = $this->createPartialMock(Deezer\Request::class, ["send", "getLastResponse"]);

        $expectedReturn = [
            "body" => json_decode(file_get_contents("tests/fixtures/$fixtureName.json"))
        ];

        $stub->expects($this->any())
            ->method("send")
            ->with(
                $this->equalTo($expectedMethod),
                $this->equalTo(Request::API_URL . $expectedUri),
                $this->equalTo($expectedParameters),
                $this->equalTo($expectedHeaders)
            )
            ->willReturn($expectedReturn);

        $stub->expects($this->any())
            ->method("getLastResponse")
            ->willReturn($expectedReturn);

        return $stub;
    }

    protected function setupApi($expectedMethod, $expectedUri, $expectedParameters, $expectedHeaders, $fixtureName): DeezerAPI
    {
        $stub = $this->setupStub(
            $expectedMethod,
            $expectedUri,
            $expectedParameters,
            $expectedHeaders,
            $fixtureName
        );

        return new Deezer\DeezerAPI([], null, $stub);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testInfos()
    {
        $api = $this->setupApi(
            "GET",
            "/infos",
            [],
            [],
            "infos"
        );

        $response = $api->infos();

        $this->assertObjectHasProperty("country_iso", $response);
    }

    /**
     * @throws DeezerAPIException
     * @group real-api
     */
    public function testRealInfos()
    {
        $response = $this->apiReal->infos();

        $this->assertObjectHasProperty("country_iso", $response);
    }

    /**
     * @throws DeezerAPIException
     */
    public function testOptions()
    {
        $api = $this->setupApi(
            "GET",
            "/options",
            [],
            [],
            "options"
        );

        $response = $api->options();

        $this->assertObjectHasProperty("type", $response);
    }

    /**
     * @throws DeezerAPIException
     * @group real-api
     */
    public function testRealOptions()
    {
        $response = $this->apiReal->options();

        $this->assertObjectHasProperty("type", $response);
    }

    public function testDeezerAPIUsesTokenProviderBeforeRequest(): void
    {
        $provider = new \Deezer\Providers\StaticTokenProvider('provider_token');

        $stub = $this->createPartialMock(\Deezer\Request::class, ['send', 'getLastResponse']);
        $stub->expects($this->once())
            ->method('send')
            ->with(
                $this->equalTo('GET'),
                $this->stringContains('/infos'),
                $this->callback(function ($params) {
                    return isset($params['access_token']) && $params['access_token'] === 'provider_token';
                }),
                $this->anything()
            )
            ->willReturn(['body' => json_decode('{"country_iso":"UA"}')]);

        $api = new \Deezer\DeezerAPI([], $provider, $stub);
        $api->infos();
    }
}
