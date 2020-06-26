<?php

namespace Arimolzer\IPStackFinder;

use GuzzleHttp\Client;

/**
 * Class IPStackFinder
 * @package Arimolzer\IPStackFinder
 */
class IPStackFinder
{
    /** @var Client $client */
    public $client;

    /**
     * IPStackHelper constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
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
}
