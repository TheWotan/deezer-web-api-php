<?php

declare(strict_types=1);

namespace Deezer;

interface TokenProviderInterface
{
    public function getToken(): string;
    public function isExpired(): bool;
    public function refresh(): bool;
}
