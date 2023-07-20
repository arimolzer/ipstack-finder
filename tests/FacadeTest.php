<?php

namespace Arimolzer\IPStackFinder\Tests;

use Arimolzer\IPStackFinder\Exceptions\InvalidConfiguration;
use Arimolzer\IPStackFinder\Facade\IPStackFinderFacade;
use Arimolzer\IPStackFinder\IPStackFinder;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Utils;
use Mockery;

/**
 * Class FacadeTest
 * @package Arimolzer\IPStackFinder\Tests
 */
class FacadeTest extends TestCase
{
    protected $client;
    protected $ipStackFinder;

    public function setUp(): void
    {
        parent::setUp();

        $this->client = Mockery::mock(Client::class);
        $this->ipStackFinder = new IPStackFinder($this->client);
    }

    /** @test */
    public function itWillThrowAnExceptionIfApiKeyIsNotSet(): void
    {
        config(['ipstack-finder.api_key' => '']);
        $this->expectException(InvalidConfiguration::class);
        IPStackFinderFacade::get('8.8.8.8');
    }

    /** @test */
    public function testItCanFetchResponseSuccessfullyFromIpStack(): void
    {
        // simulate successful client request to ip stack
        $stream = Utils::streamFor('{"ip" : "8.8.8.8"}');
        $response = new Response(200, ['Content-Type' => 'application/json'], $stream);
        $this->client->shouldReceive('request')->withArgs(['GET','8.8.8.8'])->andReturn($response);

        $data = $this->ipStackFinder->get('8.8.8.8');
        $this->assertNotNull($data['ip'], "ipstack.com has returned an unexpected result.");
    }
}
