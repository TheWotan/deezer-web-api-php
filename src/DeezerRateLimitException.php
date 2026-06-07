<?php

declare(strict_types=1);

namespace Deezer;

class DeezerRateLimitException extends DeezerAPIException
{
    private int $retryAfter;

    public function __construct(int $retryAfter)
    {
        parent::__construct('Rate limit exceeded.', 429);
        $this->retryAfter = $retryAfter;
    }

    public function getRetryAfter(): int
    {
        return $this->retryAfter;
    }
}
