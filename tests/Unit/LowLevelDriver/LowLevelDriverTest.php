<?php

namespace eLama\DirectApiV5\Test\Unit\LowLevelDriver;

use eLama\DirectApiV5\LowLevelDriver\GuzzleAdapter;
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

    /** @var LowLevelDriver */
    private $driver;

    /** @var  GuzzleAdapter */
    private $guzzleAdapter;

    protected function setUp()
    {
        $jms = \eLama\DirectApiV5\JmsFactory::create()->serializer();

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

class TestGuzzleAdapter implements GuzzleAdapter
{
    /**
     * @var mixed
     */
    public $result;

    public function __construct()
    {
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
    public function sendAsync($url, $headers, $jsonBody)
    {
        return \GuzzleHttp\Promise\promise_for($this->result);
    }
}
