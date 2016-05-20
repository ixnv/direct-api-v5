<?php

namespace eLama\DirectApiV5\LowLevelDriver;

use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Stream\Stream;

class Guzzle5LowLevelDriver extends LowLevelDriver
{

    /**
     * @param $url
     * @param $headers
     * @param $jsonBody
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    protected function sendAsync($url, $headers, $jsonBody)
    {
        $guzzleRequest = new \GuzzleHttp\Message\Request(
            'POST',
            $url,
            $headers,
            Stream::factory($jsonBody)
        );

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
}
