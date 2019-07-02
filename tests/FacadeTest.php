<?php

namespace Arimolzer\IPStackFinder\Tests;

use Arimolzer\IPStackFinder\Facade\IPFinder;
use PHPUnit\Framework\TestCase;

/**
 * Class FacadeTest
 * @package Arimolzer\IPStackFinder\Tests
 */
class FacadeTest extends TestCase
{
    /** @test */
    public function testFacade() : void
    {
        /** @var array $data */
        $data = IPFinder::get('8.8.8.8');
        $this->assertNotNull($data['ip']);
    }
}
