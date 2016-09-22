<?php

namespace eLama\DirectApiV5\Test\Unit\LowLevelDriver;

use eLama\DirectApiV5\LowLevelDriver\GuzzleAdapter;
use GuzzleHttp\Client;
use GuzzleHttp\Message\Response as Guzzle5Response;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Response as Guzzle6Response;
use GuzzleHttp\Stream\Stream;

class TestGuzzleAdapter implements GuzzleAdapter
{
    /**
     * @var array
     */
    private $headers = [];

    /**
     * @var string
     */
    private $body = '{}';

    public function __construct()
    {

    }

    public function setResponse(array $headers, $body)
    {
        $this->headers = $headers;
        $this->body = $body;
    }

    /**
     * @param array $headers
     * @param string $body
     *
     * @return Guzzle5Response|Guzzle6Response
     */
    private function createResponse(array $headers, $body)
    {
        return version_compare(Client::VERSION, 6, 'ge') ?
            new Guzzle6Response(200, $headers, $body)
            : new Guzzle5Response(200, $headers, Stream::factory($body));
    }

    /**
     * @param $url
     * @param $headers
     * @param $jsonBody
     *
     * @return PromiseInterface
     * @internal param mixed $guzzleRequest
     *
     */
    public function sendAsync($url, $headers, $jsonBody)
    {
        return \GuzzleHttp\Promise\promise_for(
            $this->createResponse($this->headers, $this->body)
        );
    }
}
