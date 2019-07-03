<?php

namespace Arimolzer\IPStackFinder;

use Illuminate\Support\ServiceProvider;

/**
 * Class IPStackFinder
 * @package Arimolzer\IPStackFinder
 */
class IPStackFinderServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('ipstack-finder.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'ipstack-finder');

        // Register the main class to use with the facade
        $this->app->singleton(IPStackFinder::class, function () {
            return new IPStackFinder;
        });
    }
}
