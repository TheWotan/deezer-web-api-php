<?php

namespace Deezer\Resources;

use Deezer\DeezerAPI;

abstract class AbstractResource implements ResourceInterface
{
    /** @var DeezerAPI $api */
    protected $api;

    /**
     * Constructor
     * Set options and class instances to use.
     *
     * @param DeezerAPI $api. Api instance.
     */
    public function __construct(DeezerAPI $api)
    {
        $this->api = $api;
    }
}
