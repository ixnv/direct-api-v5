<?php

namespace eLama\DirectApiV5\Test\Unit;

use eLama\DirectApiV5\SimpleDirectDriver;
use Psr\Log\NullLogger;

class SimpleDirectDriverTest extends \PHPUnit_Framework_TestCase
{
    /** @var SimpleDirectDriver */
    private $driver;

    public function setUp()
    {
        $this->driver = new SimpleDirectDriver(
            \eLama\DirectApiV5\JmsFactory::create()->serializer(),
            new \GuzzleHttp\Client(),
            new NullLogger(),
            $baseUrl = '',
            $token = '',
            $login = ''
        );
    }

    /**
     * @test
     */
    public function updateAds_ArrayOfWrongClasses_AssertionException()
    {
        $this->setExpectedException(\Assert\InvalidArgumentException::class);

        $this->driver->updateAds([new \stdClass()]);
    }
}
