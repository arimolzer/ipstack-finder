<?php

namespace Arimolzer\IPStackFinder\Tests;

use Arimolzer\IPStackFinder\Facade\IPStackFinderFacade;
use Arimolzer\IPStackFinder\IPStackFinderServiceProvider;
use Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables;

/**
 * Class TestCase
 * @package Arimolzer\IPStackFinder\Tests
 */
class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return ['Arimolzer\IPStackFinder\IPStackFinderServiceProvider'];
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'IPFinder' => 'IPStackFinder\Facade'
        ];
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        // Load the .env file
        $app->useEnvironmentPath(__DIR__.'/..');
        $app->bootstrapWith([LoadEnvironmentVariables::class]);
        parent::getEnvironmentSetUp($app);
    }
}
