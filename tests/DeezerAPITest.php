<?php

declare(strict_types=1);

use Deezer\Request;

class DeezerAPITest extends PHPUnit\Framework\TestCase
{
    protected $apiReal;

    protected function setUp(): void
    {
        $this->apiReal = new Deezer\DeezerAPI();
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
                $this->equalTo($expectedUri),
                $this->equalTo($expectedParameters),
                $this->equalTo($expectedHeaders)
            )
            ->willReturn($expectedReturn);

        $stub->expects($this->any())
            ->method("getLastResponse")
            ->willReturn($expectedReturn);

        return $stub;
    }

    protected function setupApi($expectedMethod, $expectedUri, $expectedParameters, $expectedHeaders, $fixtureName)
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

        $this->assertObjectHasAttribute("country_iso", $response);
    }

    public function testRealInfos()
    {
        $response = $this->apiReal->infos();

        $this->assertObjectHasAttribute("country_iso", $response);
    }
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

        $this->assertObjectHasAttribute("type", $response);
    }

    public function testRealOptions()
    {
        $response = $this->apiReal->options();

        $this->assertObjectHasAttribute("type", $response);
    }
}
