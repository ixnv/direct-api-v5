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
     * @param $service
     * @param $headers
     * @param $jsonBody
     * @return GuzzleRequest
     */
    protected function createGuzzleRequest($service, $headers, $jsonBody)
    {
        return new GuzzleRequest(
            'POST',
            'https://api-sandbox.direct.yandex.com/json/v5/' . $service,
            array_merge(self::defaultHeaders(), $headers),
            Stream::factory($jsonBody)
        );
    }
}
