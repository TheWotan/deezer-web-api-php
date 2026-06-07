<?php

declare(strict_types=1);

namespace Deezer\Tests\Providers;

use Deezer\Providers\SessionTokenProvider;
use PHPUnit\Framework\TestCase;

class SessionTokenProviderTest extends TestCase
{
    public function testGetTokenReturnsEmptyWhenNoSession(): void
    {
        $provider = new SessionTokenProvider();
        $this->assertSame('', $provider->getToken());
    }

    public function testIsExpiredReturnsTrueWhenNoSession(): void
    {
        $provider = new SessionTokenProvider();
        $this->assertTrue($provider->isExpired());
    }

    public function testRefreshReturnsFalse(): void
    {
        $provider = new SessionTokenProvider();
        $this->assertFalse($provider->refresh());
    }

    public function testCustomKeyUsedForSession(): void
    {
        $_SESSION['my_token'] = 'abc123';
        $provider = new SessionTokenProvider('my_token');
        $this->assertSame('abc123', $provider->getToken());
        unset($_SESSION['my_token']);
    }
}
