<?php

namespace eLama\DirectApiV5\LowLevelDriver;

use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Request as GuzzleRequest;

class Guzzle6LowLevelDriver extends LowLevelDriver
{

    /**
     * @param $url
     * @param $headers
     * @param $jsonBody
     * @return PromiseInterface
     */
    protected function sendAsync($url, $headers, $jsonBody)
    {
        return $this->client->sendAsync($this->createGuzzleRequest($url, $headers, $jsonBody));
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
            \GuzzleHttp\Psr7\stream_for($jsonBody)
        );
    }
}
