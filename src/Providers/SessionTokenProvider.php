<?php

declare(strict_types=1);

namespace Deezer\Providers;

use Deezer\TokenProviderInterface;

class SessionTokenProvider implements TokenProviderInterface
{
    private string $key;

    public function __construct(string $key = 'deezer_token')
    {
        $this->key = $key;
    }

    public function getToken(): string
    {
        return $_SESSION[$this->key] ?? '';
    }

    public function isExpired(): bool
    {
        return time() > (int)($_SESSION[$this->key . '_expires'] ?? 0);
    }

    public function refresh(): bool
    {
        return false;
    }
}
