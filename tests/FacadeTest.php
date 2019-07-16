<?php

namespace Arimolzer\IPStackFinder\Tests;

use Arimolzer\IPStackFinder\Facade\IPStackFinderFacade;

/**
 * Class FacadeTest
 * @package Arimolzer\IPStackFinder\Tests
 */
class FacadeTest extends TestCase
{
    /** @test */
    public function testFacade() : void
    {
        /**
         * Lets make a request to ipstack using Googles public DNS IP
         * @var array $data
         */
        $data = IPStackFinderFacade::get('8.8.8.8');

        // Test an API key has been configured
        $this->assertNotNull(config('ipstack-finder'), "No config");
        $this->assertNotNull(config('ipstack-finder.api_key'), "Couldn't Load .env");

        // Check if you are getting a success response from the API
        $this->assertFalse(isset($data['success']), "ipstack.com has returned a failure response.");
        $this->assertNotNull($data['ip'], "ipstack.com has returned an unexpected result.");
    }
}
