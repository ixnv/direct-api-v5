<?php

namespace eLama\DirectApiV5\Test\Unit\LowLevelDriver;

use eLama\DirectApiV5\JmsFactory;
use eLama\DirectApiV5\LowLevelDriver\LowLevelDriver;
use eLama\DirectApiV5\Request;
use eLama\DirectApiV5\Serializer\ArraySerializer;
use Phake;
use PHPUnit_Framework_TestCase;
use Psr\Log\LoggerInterface;

class LowLevelDriverTest extends PHPUnit_Framework_TestCase
{
    const SOME_TOKEN = 'some token';
    /** @var LoggerInterface|\Phake_IMock */
    private $logger;

    /** @var  ArraySerializer */
    private $serializer;

    /** @var LowLevelDriver */
    private $driver;

    /** @var  TestGuzzleAdapter */
    private $guzzleAdapter;

    protected function setUp()
    {
        $jms = JmsFactory::create()->serializer();

        $this->logger = Phake::mock(LoggerInterface::class);
        $this->serializer = new ArraySerializer($jms);
        $this->guzzleAdapter = new TestGuzzleAdapter();
        $this->driver = new LowLevelDriver($this->guzzleAdapter, $this->logger);
    }

    /**
     * @test
     */
    public function doRequest_LogsRequest()
    {
        $request = $this->createRequest();

        $this->driver->execute(
            $request,
            $this->serializer
        )->wait();

        Phake::verify($this->logger)->info(containsStringIgnoringCase('request'), allOf(
            hasKeyValuePair('callUniqId', nonEmptyString()),
            hasKeyValuePair('clientLogin', $request->getClientLogin()),
            hasKeyValuePair('service', $request->getService()),
            hasKeyValuePair('method', $request->getMethod()),
            hasKeyValuePair('request_body', containsString(json_encode($request->getParams())))
        ));
    }

    /**
     * @test
     */
    public function doRequest_LogsRequestWithStrippedToken()
    {
        $this->driver->execute(
            $this->createRequest($token = '1234567890'),
            $this->serializer
        )->wait();

        Phake::verify($this->logger)->info(
            containsStringIgnoringCase('request'),
            hasKeyValuePair('token', '1234...7890')
        );
    }

    /**
     * @test
     */
    public function doRequest_ResponseSuccessfullyDeserialized_LogsResponseBody()
    {
        $responseBody = json_encode(['result' => 1]);
        $this->guzzleAdapter->setResponse([], $responseBody);

        $this->driver->execute(
            $this->createRequest(),
            $this->serializer
        )->wait();

        Phake::verify($this->logger)->info(containsStringIgnoringCase('response'), allOf(
            hasKeyValuePair('response_body', containsString($responseBody))
        ));
    }

    /**
     * @test
     */
    public function doRequest_UnitsHeaderIsSet_LogsUnitsInfo()
    {
        $this->guzzleAdapter->setResponse(['units' => '1/2/3']);

        $this->driver->execute(
            $this->createRequest(),
            $this->serializer
        )->wait();

        Phake::verify($this->logger)->info(containsStringIgnoringCase('response'), allOf(
            hasKeyValuePair('response_units_taken', equalTo(1)),
            hasKeyValuePair('response_units_left', equalTo(2)),
            hasKeyValuePair('response_units_dailyLimit', equalTo(3))
        ));
    }

    /**
     * @test
     */
    public function doRequest_UseAgencyUnits_RequestHasHeader()
    {
        $adapter = Phake::partialMock(TestGuzzleAdapter::class);
        $driver = new LowLevelDriver($adapter, $this->logger);
        $driver->execute(
            $this->createRequest(self::SOME_TOKEN, $useAgencyUnits = true),
            $this->serializer
        )->wait();

        Phake::verify($adapter)->sendAsync(
            stringValue(),
            hasKeyValuePair(equalTo('Use-Operator-Units'), equalTo('true')),
            stringValue()
        );
    }
    /**
     * @test
     */
    public function doRequest_UseAgencyUnits_RequestLogsMark()
    {
        $this->driver->execute(
            $this->createRequest(self::SOME_TOKEN, $useAgencyUnits = true),
            $this->serializer
        )->wait();

        Phake::verify($this->logger)->info(containsStringIgnoringCase('request'), allOf(
            hasKeyValuePair('agencyUnitsUsed', equalTo(true))
        ));
    }

    /**
     * @test
     */
    public function doRequest_UseAgencyUnits_ResponseLogsUnitsInfo()
    {
        $this->guzzleAdapter->setResponse(['units' => '1/2/3']);

        $this->driver->execute(
            $this->createRequest(self::SOME_TOKEN, $useAgencyUnits = true),
            $this->serializer
        )->wait();

        Phake::verify($this->logger)->info(containsStringIgnoringCase('response'), allOf(
            hasKeyValuePair('response_agency_units_taken', equalTo(1)),
            hasKeyValuePair('response_agency_units_left', equalTo(2)),
            hasKeyValuePair('response_agency_units_dailyLimit', equalTo(3)),
            hasKeyValuePair('response_agency_units_percentLeft', equalTo(66))
        ));
    }

    /**
     * @param string $token
     * @param bool $useAgencyUnits
     *
     * @return Request
     */
    private function createRequest($token = self::SOME_TOKEN, $useAgencyUnits = false)
    {
        $request = new Request(
            $token,
            'service value',
            'method value',
            ['some key' => 'some parameter'],
            'client login',
            $useAgencyUnits
        );

        return $request;
    }

}
