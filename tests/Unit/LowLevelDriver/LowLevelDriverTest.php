<?php

namespace eLama\DirectApiV5\Test\Unit\LowLevelDriver;

use eLama\DirectApiV5\LowLevelDriver\LowLevelDriver;
use eLama\DirectApiV5\Request;
use eLama\DirectApiV5\Serializer\ArraySerializer;
use GuzzleHttp\Client;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Stream\Stream;
use Phake;
use PHPUnit_Framework_TestCase;
use Psr\Log\LoggerInterface;
use GuzzleHttp\Psr7\Response as Guzzle6Response;
use GuzzleHttp\Message\Response as Guzzle5Response;

class LowLevelDriverTest extends PHPUnit_Framework_TestCase
{
    const SOME_TOKEN = 'some token';
    /** @var LoggerInterface|\Phake_IMock */
    private $logger;

    /** @var  ArraySerializer */
    private $serializer;

    /** @var TestLowLevelDriver */
    private $driver;

    protected function setUp()
    {
        $jms = \eLama\DirectApiV5\JmsFactory::create()->serializer();

        $this->logger = Phake::mock(LoggerInterface::class);
        $this->serializer = new ArraySerializer($jms);
        $this->driver = new TestLowLevelDriver(new Client(), $this->logger);
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
            hasKeyValuePair('uniqId', nonEmptyString()),
            hasKeyValuePair('clientLogin', $request->getClientLogin()),
            hasKeyValuePair('service', $request->getService()),
            hasKeyValuePair('method', $request->getMethod()),
            hasKeyValuePair('params', $request->getParams())
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
        $this->driver->setResponse([], json_encode(['result' => 1]));

        $this->driver->execute(
            $this->createRequest(),
            $this->serializer
        )->wait();

        Phake::verify($this->logger)->info(containsStringIgnoringCase('response'), allOf(
            hasKeyValuePair('response_body', hasKeyValuePair('result', 1))
        ));
    }

    /**
     * @test
     */
    public function doRequest_UnitsHeaderIsSet_LogsUnitsInfo()
    {
        $this->driver->setResponse(['units' => '1/2/3']);

        $this->driver->execute(
            $this->createRequest(),
            $this->serializer
        )->wait();

        Phake::verify($this->logger)->info(containsStringIgnoringCase('response'), allOf(
            hasKeyValuePair('units_taken', equalTo(1)),
            hasKeyValuePair('units_left', equalTo(2)),
            hasKeyValuePair('units_dailyLimit', equalTo(3))
        ));
    }

    /**
     * @param $token
     * @return Request
     */
    private function createRequest($token = self::SOME_TOKEN)
    {
        $request = new Request(
            $token,
            'service value',
            'method value',
            ['some key' => 'some parameter'],
            'client login'
        );

        return $request;
    }

}

class TestLowLevelDriver extends LowLevelDriver
{
    /**
     * @var mixed
     */
    public $result;

    public function __construct(\GuzzleHttp\Client $client, LoggerInterface $logger, $baseUrl = self::URL_PRODUCTION)
    {
        parent::__construct($client, $logger, $baseUrl);

        $this->setResponse();
    }

    public function setResponse(array $headers = [], $body = '{}')
    {
        $this->result = $this->createResponse($headers, $body);
    }

    /**
     * @param array $headers
     * @param string $body
     * @return Guzzle5Response|Guzzle6Response
     */
    private function createResponse(array $headers, $body)
    {
        return version_compare(Client::VERSION, 6, 'ge') ?
            new Guzzle6Response(200, $headers, $body)
            : new Guzzle5Response(200, $headers, Stream::factory($body));
    }

    /**
     * @param mixed $guzzleRequest
     * @return PromiseInterface
     */
    protected function sendAsync($url, $headers, $jsonBody)
    {
        return \GuzzleHttp\Promise\promise_for($this->result);
    }
}
