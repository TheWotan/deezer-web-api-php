<?php

declare(strict_types=1);

use Deezer\Request;
use Deezer\Session;

class SessionTest extends PHPUnit\Framework\TestCase
{
    private $app_id = '501282';
    private $secret = '4ebcfc1c71578fcb493fc64d01b968e5';
    private $redirect_uri = 'https://example.com/callback';
    private $access_token = 'frdqsR4x54gbtMTVRsapJIDERSUsBjGp15RWe4s8O0rlKalozWC';

    private function setupStub($expectedMethod, $expectedUrl, $expectedParameters, $expectedHeaders, $expectedReturn)
    {
        $stub = $this->createPartialMock(Request::class, ['send']);

        $stub->expects($this->once())
            ->method('send')
            ->with(
                $this->equalTo($expectedMethod),
                $this->equalTo($expectedUrl),
                $this->equalTo($expectedParameters),
                $this->equalTo($expectedHeaders)
            )
            ->willReturn($expectedReturn);

        return $stub;
    }

    public function testGenerateState()
    {
        $session = new Session($this->app_id, $this->secret, $this->redirect_uri);

        $state = $session->generateState();

        $this->assertEquals(16, strlen($state));
        $this->assertIsString($state);
    }

    public function testGetAuthorizeUrl()
    {
        $session = new Session($this->app_id, $this->secret, $this->redirect_uri);

        $state = 'state_value';
        $url = $session->getAuthorizeUrl([
            'perms' => ['basic_access', 'email'],
            'state' => $state,
        ]);

        $this->assertStringContainsString('app_id=' . $this->app_id, $url);
        $this->assertStringContainsString('redirect_uri=' . urlencode($this->redirect_uri), $url);
        $this->assertStringContainsString('perms=' . urlencode('basic_access,email'), $url);
        $this->assertStringContainsString('state=' . $state, $url);
        $this->assertStringContainsString('https://connect.deezer.com/oauth/auth.php', $url);
    }

    public function testRequestAccessToken()
    {
        $code = 'frccf3f38531d8ef0390bfc3796c81e8';
        $expected = [
            'app_id' => $this->app_id,
            'secret' => $this->secret,
            'code' => $code,
        ];

        $response = file_get_contents("tests/fixtures/access_token.txt");
        parse_str($response, $params);
        $return = [
            'body' => $params,
        ];

        $stub = $this->setupStub(
            'GET',
            Session::AUTH_URL . '/oauth/access_token.php',
            $expected,
            [],
            $return
        );

        $session = new Session($this->app_id, $this->secret, $this->redirect_uri, $stub);
        $result = $session->requestAccessToken($code);

        $this->assertTrue($result);
        $this->assertNotEmpty($session->getAccessToken());
        $this->assertNotEmpty($session->getExpires());
    }

    public function testRequestAccessTokenWrongCode()
    {
        $code = 'frccf3f38531d8ef0390bfc3796c81e8';
        $expected = [
            'app_id' => $this->app_id,
            'secret' => $this->secret,
            'code' => $code,
        ];

        $response = file_get_contents("tests/fixtures/wrong_code.txt");
        parse_str($response, $params);
        $return = [
            'body' => $params,
        ];

        $stub = $this->setupStub(
            'GET',
            Session::AUTH_URL . '/oauth/access_token.php',
            $expected,
            [],
            $return
        );

        $session = new Session($this->app_id, $this->secret, $this->redirect_uri, $stub);
        $result = $session->requestAccessToken($code);

        $this->assertFalse($result);
    }
}
