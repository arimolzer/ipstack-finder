<?php

namespace Arimolzer\IPStackFinder\Facade;

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
        return 'IPFinder';
    }
}
