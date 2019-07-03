<?php

namespace Arimolzer\IPStackFinder\Facade;

use Arimolzer\IPStackFinder\IPStackFinder;
use Illuminate\Support\Facades\Facade;

/**
 * Class IPStackFinder
 * @package Arimolzer\IPStackFinder
 */
class IPStackFinderFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor() : string
    {
        return IPStackFinder::class;
    }
}
