<?php

namespace eLama\DirectApiV5\LowLevelDriver;

use GuzzleHttp\Client;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Request as GuzzleRequest;

class Guzzle6Adapter implements GuzzleAdapter
{
    /**
     * @var Client
     */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param $url
     * @param $headers
     * @param $jsonBody
     * @return PromiseInterface
     */
    public function sendAsync($url, $headers, $jsonBody)
    {
        return $this->client->sendAsync(
            new GuzzleRequest(
                'POST',
                $url,
                $headers,
                \GuzzleHttp\Psr7\stream_for($jsonBody)
            )
        );
    }
}
