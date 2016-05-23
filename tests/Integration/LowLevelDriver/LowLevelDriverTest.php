<?php

namespace eLama\DirectApiV5\Test\Integration\LowLevelDriver;

use eLama\DirectApiV5\LowLevelDriver\LowLevelDriver;
use eLama\DirectApiV5\Request;
use eLama\DirectApiV5\Response;
use eLama\DirectApiV5\Serializer\ArraySerializer;
use eLama\DirectApiV5\Test\Integration\GeneralTest;
use GuzzleHttp\Client;
use PHPUnit_Framework_TestCase;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class LowLevelDriverTest extends PHPUnit_Framework_TestCase
{
    /** @var  ArraySerializer */
    private $serializer;

    /** @var LowLevelDriver */
    private $driver;

    protected function setUp()
    {
        $jms = \eLama\DirectApiV5\JmsFactory::create()->serializer();

        $this->serializer = new ArraySerializer($jms);
        $this->driver = LowLevelDriver::createAdapterForClient(new Client(), new NullLogger(), LowLevelDriver::URL_SANDBOX);
    }

    /**
     * @test
     */
    public function execute_ParsesRequestIdFromHeaders()
    {
        /** @var Response $response */
        $response = $this->driver->execute(
            $this->createRequest(),
            $this->serializer
        )->wait();

        assertThat($response->getRequestId(), matchesPattern('/\d+/'));
    }

    /**
     * @test
     */
    public function execute_ParsesUnitsFromHeaders()
    {
        /** @var Response $response */
        $response = $this->driver->execute(
            $this->createRequest(),
            $this->serializer
        )->wait();

        $unitsInfo = $response->getUnits();
        assertThat($unitsInfo->getTaken(), is(numericValue()));
        assertThat($unitsInfo->getLeft(), is(numericValue()));
        assertThat($unitsInfo->getDailyLimit(), is(numericValue()));
    }

    /**
     * @param $token
     * @return Request
     */
    private function createRequest()
    {
        return new Request(
            GeneralTest::TOKEN,
            'campaigns',
            'get',
            [],
            GeneralTest::LOGIN
        );
    }

}

