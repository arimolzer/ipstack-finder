<?php

namespace Arimolzer\IPStackFinder;

use Arimolzer\IPStackFinder\Exceptions\InvalidConfiguration;
use Arimolzer\IPStackFinder\Facade\IPStackFinderFacade;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

/**
 * Class IPStackFinder
 * @package Arimolzer\IPStackFinder
 */
class IPStackFinderServiceProvider extends ServiceProvider
{
     /** @var string */
    const BASE_URI = 'http://api.ipstack.com/';

    /** @var string */
    const DEFAULT_LANGUAGE = 'en';

    /** @var array $supportedLanguages */
    private $supportedLanguages = [
        'en',    // English/US
        'de',    // German
        'es',    // Spanish
        'fr',    // French
        'ja',    // Japanese
        'pt-br', // Portugues (Brazil)
        'ru',    // Russian
        'zh',    // Chinese
    ];

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
        $this->app->bind('IPFinder', function () {
            $client = $this->app->make(Client::class);
            return new IPStackFinder($client);
        });

        $this->app->bind(Client::class, function() {
            if (empty(config('ipstack-finder.api_key'))) {
                throw InvalidConfiguration::apiKeyNotSet();
            }

            return new Client([
                'base_uri' => self::BASE_URI,
                'query' => [
                    'access_key' => config('ipstack-finder.api_key'),
                    'language' => $this->getLanguage()
                ]
            ]);
        });
    }

    /**
     * Defensive programming to not give ipstack.com an invalid language param.
     * If the .env or config file provided language code is not valid, return the default.
     * @return string
     */
    private function getLanguage() : string
    {
        /** @var string $defaultLanguage */
        $defaultLanguage = config('ipstack-finder.default_language');

        return (in_array($defaultLanguage, $this->supportedLanguages))
            ? $defaultLanguage : self::DEFAULT_LANGUAGE;
    }
}
