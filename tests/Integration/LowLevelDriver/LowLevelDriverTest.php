<?php

namespace eLama\DirectApiV5\Test\Integration\LowLevelDriver;

use eLama\DirectApiV5\JmsFactory;
use eLama\DirectApiV5\LowLevelDriver\LowLevelDriver;
use eLama\DirectApiV5\Request;
use eLama\DirectApiV5\Response;
use eLama\DirectApiV5\Serializer\ArraySerializer;
use eLama\DirectApiV5\Test\Integration\DirectApiV5TestCase;
use GuzzleHttp\Client;
use Phake;
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
        $jms = JmsFactory::create()->serializer();

        $this->serializer = new ArraySerializer($jms);
        $this->driver = LowLevelDriver::createAdapterForClient(new Client(), new NullLogger(), LowLevelDriver::URL_SANDBOX);
    }

    /**
     * @test
     */
    public function execute_ParsesRequestIdFromHeader()
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
    public function execute_ParsesUnitsFromHeader()
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
     * @test
     */
    public function execute_ParsesDateFromHeader()
    {
        /** @var Response $response */
        $response = $this->driver->execute(
            $this->createRequest(),
            $this->serializer
        )->wait();

        assertThat($response->getDate(), is(anInstanceOf(\DateTimeImmutable::class)));
    }

    /**
     * @test
     */
    public function execute_DirectErrorHappens_ToggsThatErrorAsError()
    {
        $logger = Phake::mock(LoggerInterface::class);
        $lowLevelDriver = LowLevelDriver::createAdapterForClient(new Client(), $logger, LowLevelDriver::URL_SANDBOX);

        $lowLevelDriver->execute($this->createRequest('invalid token'), $this->serializer)->wait();

        Phake::verify($logger)->warning(
            typeOf('string'),
            allOf(
                hasKeyValuePair('response_error_code', typeOf('integer')),
                hasKeyValuePair('response_error_string', typeOf('string')),
                hasKeyValuePair('response_error_detail', typeOf('string')),
                hasKeyValuePair('response_error_request_id', typeOf('string'))
            )
        );
    }

    /**
     * @test
     */
    public function execute_UseAgencyUnits_LogsHasKeys()
    {
        $logger = Phake::mock(LoggerInterface::class);
        $lowLevelDriver = LowLevelDriver::createAdapterForClient(new Client(), $logger, LowLevelDriver::URL_SANDBOX);

        $lowLevelDriver->execute($this->createRequest(DirectApiV5TestCase::TOKEN, $useAgencyUnits = true), $this->serializer)->wait();

        Phake::verify($logger)->info(
            containsStringIgnoringCase('request'),
            hasKeyValuePair('agencyUnitsUsed', equalTo(true))
        );
        Phake::verify($logger)->warning(
            containsStringIgnoringCase('response'),
            allOf(
                hasKeyValuePair('response_agency_units_taken', typeOf('integer')),
                hasKeyValuePair('response_agency_units_left', typeOf('integer')),
                hasKeyValuePair('response_agency_units_dailyLimit', typeOf('integer')),
                hasKeyValuePair('response_agency_units_percentLeft', typeOf('double'))
            )
        );
    }

    /**
     * @param string $token
     * @param bool $useAgencyUnits
     *
     * @return Request
     */
    private function createRequest($token = DirectApiV5TestCase::TOKEN, $useAgencyUnits = false)
    {
        return new Request(
            $token,
            'campaigns',
            'get',
            [],
            DirectApiV5TestCase::LOGIN,
            $useAgencyUnits
        );
    }

}

