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
    /** @var LoggerInterface|\Phake_IMock */
    private $logger;

    /** @var  ArraySerializer */
    private $serializer;

    protected function setUp()
    {
        $jms = \eLama\DirectApiV5\JmsFactory::create()->serializer();

        $this->logger = Phake::mock(LoggerInterface::class);
        $this->serializer = new ArraySerializer($jms);
    }

    /**
     * @test
     */
    public function doRequest_LogsRequest()
    {
        $testLowLevelDriver = new TestLowLevelDriver(new Client(), $this->logger);

        $request = $this->createRequest('some token');


        $testLowLevelDriver->execute(
            $request,
            $this->serializer
        )->wait();

        Phake::verify($this->logger)->info(stringValue(), allOf(
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

        $testLowLevelDriver = new TestLowLevelDriver(new Client(), $this->logger);

        $request = $this->createRequest($token = '1234567890');

        $testLowLevelDriver->execute(
            $request,
            $this->serializer
        )->wait();

        Phake::verify($this->logger)->info(stringValue(), hasKeyValuePair('token', '1234...7890'));
    }

    /**
     * @param $token
     * @return Request
     */
    private function createRequest($token)
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

        $this->result = self::createResponse();
    }

    /**
     * @return Guzzle5Response|Guzzle6Response
     */
    public static function createResponse()
    {
        return version_compare(Client::VERSION, 6, 'ge') ?
            new Guzzle6Response()
            : new Guzzle5Response(200, [], Stream::factory(''));
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
