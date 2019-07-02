<?php

namespace Arimolzer\IPStackFinder\Helpers;

use GuzzleHttp\Client;

/**
 * Class IPStackHelper
 * @package Arimolzer\Helpers
 */
class IPStackHelper
{
    /** @var string */
    const BASE_URI = 'http://api.ipstack.com/';

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
                'language' => config('ipstack-finder.default_language')
            ]
        ]);
    }

    /**
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
}
