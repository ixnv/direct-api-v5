<?php

namespace eLama\DirectApiV5\LowLevelDriver;

use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Request as GuzzleRequest;
use GuzzleHttp\Stream\Stream;

class Guzzle6LowLevelDriver extends LowLevelDriver
{

    /**
     * @param GuzzleRequest $guzzleRequest
     * @return PromiseInterface
     */
    protected function sendAsync($guzzleRequest)
    {
        return $this->client->sendAsync($guzzleRequest);
    }

    /**
     * @param $url
     * @param $headers
     * @param $jsonBody
     * @return GuzzleRequest
     */
    protected function createGuzzleRequest($url, $headers, $jsonBody)
    {
        return new GuzzleRequest(
            'POST',
            $url,
            $headers,
            Stream::factory($jsonBody)
        );
    }
}
