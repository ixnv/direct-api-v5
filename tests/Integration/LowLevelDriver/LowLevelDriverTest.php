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
    const SOME_TOKEN = 'some token';
    /** @var LoggerInterface|\Phake_IMock */
    private $logger;

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
//    }
//
//    /**
//     * @test
//     */
//    public function doRequest_LogsRequestWithStrippedToken()
//    {
//        $this->driver->execute(
//            $this->createRequest($token = '1234567890'),
//            $this->serializer
//        )->wait();
//
//        Phake::verify($this->logger)->info(
//            containsStringIgnoringCase('request'),
//            hasKeyValuePair('token', '1234...7890')
//        );
//    }
//
//    /**
//     * @test
//     */
//    public function doRequest_ResponseSuccessfullyDeserialized_LogsResponseBody()
//    {
//        $this->driver->setResponse([], json_encode(['result' => 1]));
//
//        $this->driver->execute(
//            $this->createRequest(),
//            $this->serializer
//        )->wait();
//
//        Phake::verify($this->logger)->info(containsStringIgnoringCase('response'), allOf(
//            hasKeyValuePair('response_body', hasKeyValuePair('result', 1))
//        ));
//    }

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

