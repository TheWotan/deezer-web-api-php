<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

abstract class AbstractResourceTest extends TestCase
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
            "body" => json_decode(file_get_contents(__DIR__ . "/../fixtures/$fixtureName.json"))
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
}
