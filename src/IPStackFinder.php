<?php

namespace Arimolzer\IPStackFinder;

use GuzzleHttp\Client;

/**
 * Class IPStackFinder
 * @package Arimolzer\IPStackFinder
 */
class IPStackFinder
{
    /** @var string */
    const BASE_URI = 'http://api.ipstack.com/';

    /** @var string */
    const DEFAULT_LANGUAGE = 'en';

    /** @var Client $client */
    public $client;

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
     * IPStackHelper constructor.
     */
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => self::BASE_URI,
            'query' => [
                'access_key' => config('ipstack-finder.api_key'),
                'language' => $this->getLanguage()
            ]
        ]);
    }

    /**
     * Get the API response from ipstack.com and return in php associative array format.
     * @param $ipAddress
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($ipAddress) : array
    {
        /** @var string $responseJson */
        $responseJson = $this->client
            ->request('GET', $ipAddress)
            ->getBody()
            ->getContents();

        /** @var array */
        return json_decode($responseJson, true);
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
