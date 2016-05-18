<?php

namespace eLama\DirectApiV5\LowLevelDriver;

use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Stream\Stream;

class Guzzle5LowLevelDriver extends LowLevelDriver
{

    /**
     * @param \GuzzleHttp\Message\Request $guzzleRequest
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    protected function sendAsync($guzzleRequest)
    {
        $guzzleRequest->getConfig()->set('future', true);

        $futureResponse = $this->client->send($guzzleRequest);

        $promise = new Promise(
            function () use ($futureResponse) {
                $futureResponse->wait();
            },
            function () use ($futureResponse) {
                $futureResponse->cancel();
            }
        );

        $futureResponse->then(
            function ($result) use ($promise) {
                $promise->resolve($result);
            },
            function ($reason) use ($promise) {
                $promise->reject($reason);
            }
        );

        return $promise;
    }

    /**
     * @param $url
     * @param $headers
     * @param $jsonBody
     * @return \GuzzleHttp\Message\Request
     */
    protected function createGuzzleRequest($url, $headers, $jsonBody)
    {
        return new \GuzzleHttp\Message\Request(
            'POST',
            $url,
            $headers,
            Stream::factory($jsonBody)
        );
    }
}
