<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Deezer\Providers\StaticTokenProvider;
use Deezer\Providers\SessionTokenProvider;

class TokenProviderTest extends TestCase
{
    public function testStaticTokenProviderReturnsToken(): void
    {
        $provider = new StaticTokenProvider('my_token_123');
        $this->assertSame('my_token_123', $provider->getToken());
    }

    public function testStaticTokenProviderNeverExpires(): void
    {
        $provider = new StaticTokenProvider('token');
        $this->assertFalse($provider->isExpired());
    }

    public function testStaticTokenProviderRefreshReturnsFalse(): void
    {
        $provider = new StaticTokenProvider('token');
        $this->assertFalse($provider->refresh());
    }

    public function testSessionTokenProviderReadsFromSession(): void
    {
        $_SESSION['deezer_token'] = 'session_token';
        $_SESSION['deezer_token_expires'] = time() + 3600;

        $provider = new SessionTokenProvider();
        $this->assertSame('session_token', $provider->getToken());
        $this->assertFalse($provider->isExpired());
    }

    public function testSessionTokenProviderDetectsExpiry(): void
    {
        $_SESSION['deezer_token'] = 'old_token';
        $_SESSION['deezer_token_expires'] = time() - 1;

        $provider = new SessionTokenProvider();
        $this->assertTrue($provider->isExpired());
    }

    public function testSessionTokenProviderUsesCustomKey(): void
    {
        $_SESSION['my_key'] = 'custom_token';
        $_SESSION['my_key_expires'] = time() + 3600;

        $provider = new SessionTokenProvider('my_key');
        $this->assertSame('custom_token', $provider->getToken());
    }
}
