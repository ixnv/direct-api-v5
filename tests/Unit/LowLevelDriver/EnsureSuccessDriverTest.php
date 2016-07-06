<?php

namespace eLama\DirectApiV5\Test\Unit\LowLevelDriver;

use eLama\DirectApiV5\ErrorCode;
use eLama\DirectApiV5\JmsFactory;
use eLama\DirectApiV5\LowLevelDriver\EnsureSuccessDriver;
use eLama\DirectApiV5\LowLevelDriver\LowLevelDriver;
use eLama\DirectApiV5\Request;
use eLama\DirectApiV5\Serializer\ArraySerializer;
use Phake;
use Psr\Log\LoggerInterface;

class EnsureSuccessDriverTest extends \PHPUnit_Framework_TestCase
{
    const SOME_TOKEN = 'some token';

    /**
     * @var EnsureSuccessDriver
     */
    private $driver;

    /**
     * @var LoggerInterface|\Phake_IMock
     */
    private $logger;

    /**
     * @var ArraySerializer
     */
    private $serializer;

    /**
     * @var TestGuzzleAdapter
     */
    private $guzzleAdapter;

    public function setUp()
    {
        $jms = JmsFactory::create()->serializer();

        $this->logger = Phake::mock(LoggerInterface::class);
        $this->serializer = new ArraySerializer($jms);
        $this->guzzleAdapter = new TestGuzzleAdapter();

        $this->driver = new EnsureSuccessDriver(
            new LowLevelDriver($this->guzzleAdapter, $this->logger)
        );
    }

    /**
     * @test
     */
    public function execute_EnoughUnits_LogsAgencyUnitNotUsed()
    {
        $this->setResponse('1/2/3', ['result' => []]);
        $this->driver->execute(
            $this->createRequest(),
            $this->serializer
        )->wait();

        Phake::verify($this->logger)->info(containsStringIgnoringCase('response'), allOf(
            hasKeyValuePair('response_units_left', equalTo(2))
        ));
        Phake::verify($this->logger)->info(containsStringIgnoringCase('request'), allOf(
            hasKeyValuePair('agencyUnitsUsed', equalTo(false))
        ));
        Phake::verify($this->logger, Phake::never())->info(containsStringIgnoringCase('request'), allOf(
            hasKeyValuePair('agencyUnitsUsed', equalTo(true))
        ));
    }

    /**
     * @test
     */
    public function execute_NotEnoughUnitsAllowedMethod_LogsAgencyUnitUsed()
    {
        $this->setResponse();
        $this->driver->execute(
            $this->createRequest(),
            $this->serializer
        )->wait();

        Phake::verify($this->logger)->info(containsStringIgnoringCase('request'), allOf(
            hasKeyValuePair('agencyUnitsUsed', equalTo(false))
        ));
        Phake::verify($this->logger)->info(containsStringIgnoringCase('request'), allOf(
            hasKeyValuePair('agencyUnitsUsed', equalTo(true))
        ));
    }

    /**
     * @test
     */
    public function execute_NotEnoughUnitsDisallowedMethod_LogsAgencyUnitNotUsed()
    {
        $this->setResponse();
        $this->driver->execute(
            $this->createRequest('campaign', 'add'),
            $this->serializer
        )->wait();

        Phake::verify($this->logger)->info(containsStringIgnoringCase('request'), allOf(
            hasKeyValuePair('agencyUnitsUsed', equalTo(false))
        ));
        Phake::verify($this->logger, Phake::never())->info(containsStringIgnoringCase('request'), allOf(
            hasKeyValuePair('agencyUnitsUsed', equalTo(true))
        ));
    }

    private function setResponse($units = '0/0/3', $body = false)
    {
        if(!$body) {
            $body = [
                'error' => [
                    "request_id"   => "123456",
                    "error_code"   => ErrorCode::NOT_ENOUGH_YANDEX_UNITS,
                    "error_string" => "Test error",
                    "error_detail" => "Test error detail"
                ]
            ];
        }
        $this->guzzleAdapter->setResponse(['units' => $units], json_encode($body));
    }

    /**
     * @param string $service
     * @param string $method
     *
     * @return Request
     */
    private function createRequest($service = 'campaign', $method = 'resume')
    {
        return new Request(
            self::SOME_TOKEN,
            $service,
            $method,
            [],
            'client login'
        );
    }
}