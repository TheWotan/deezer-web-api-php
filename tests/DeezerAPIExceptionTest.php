<?php

declare(strict_types=1);

namespace Deezer\Tests;

use Deezer\DeezerAPIException;
use PHPUnit\Framework\TestCase;

class DeezerAPIExceptionTest extends TestCase
{
    public function testGetTypeReturnsNullByDefault(): void
    {
        $e = new DeezerAPIException('error', 400);
        $this->assertNull($e->getType());
    }

    public function testSetAndGetType(): void
    {
        $e = new DeezerAPIException('error', 400);
        $e->setType('OAuthException');
        $this->assertSame('OAuthException', $e->getType());
    }
}
