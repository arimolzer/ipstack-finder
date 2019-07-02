<?php

namespace Arimolzer\IPStackFinder\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * Class IPStackFinder
 * @package Arimolzer\IPStackFinder
 */
class IPFinder extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'IPFinder';
    }
}
