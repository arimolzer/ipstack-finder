<?php

namespace Arimolzer\IPStackFinder;

use Illuminate\Support\Facades\Facade;

/**
 * Class IPStackFinderFacade
 * @package Arimolzer\IPStackFinder
 */
class IPStackFinderFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'IPFinder';
    }
}
