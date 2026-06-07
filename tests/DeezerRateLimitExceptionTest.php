<?php

declare(strict_types=1);

namespace Deezer\Tests;

use Deezer\DeezerAPIException;
use Deezer\DeezerRateLimitException;
use PHPUnit\Framework\TestCase;

class DeezerRateLimitExceptionTest extends TestCase
{
    public function testExtendsBaseException(): void
    {
        $e = new DeezerRateLimitException(30);
        $this->assertInstanceOf(DeezerAPIException::class, $e);
    }

    public function testGetRetryAfterReturnsValue(): void
    {
        $e = new DeezerRateLimitException(42);
        $this->assertSame(42, $e->getRetryAfter());
    }

    public function testCodeIs429(): void
    {
        $e = new DeezerRateLimitException(10);
        $this->assertSame(429, $e->getCode());
    }

    public function testMessageIsSet(): void
    {
        $e = new DeezerRateLimitException(10);
        $this->assertSame('Rate limit exceeded.', $e->getMessage());
    }
}
