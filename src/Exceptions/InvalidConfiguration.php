<?php

namespace Arimolzer\IPStackFinder\Exceptions;

use Exception;

class InvalidConfiguration extends Exception
{
    public static function apiKeyNotSet()
    {
        return new static('There was no api key specified. You must provide a valid api key to send requests on IP Stack.');
    }
}
