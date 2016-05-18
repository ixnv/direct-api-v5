<?php

namespace eLama\DirectApiV5\ClientAdapter;

use eLama\DirectApiV5\Request;
use eLama\DirectApiV5\Serializer\Serializer;
use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Promise\PromiseInterface;

abstract class LowLevelDriver
{
    /** @var  \GuzzleHttp\Client; */
    protected $client;

    public static function createAdapterForClient(\GuzzleHttp\Client $client)
    {
        if (version_compare($client::VERSION, '6', 'ge')) {
            return new Guzzle6LowLevelDriver($client);
        } else {
            return new Guzzle5LowLevelDriver($client);
        }
    }

    public function __construct(\GuzzleHttp\Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param Request $request
     * @return Promise on \eLama\DirectApiV5\Response
     */
    public function execute(Request $request, Serializer $serializer)
    {

        $body = [
            'method' => $request->getMethod(),
            'params' => $request->getParams()
        ];

        $jsonBody = $serializer->serialize($body);


        $headers = [
            'Authorization' => 'Bearer ' . $request->getToken()
        ];

        if ($request->getClientLogin()) {
            $headers['Client-Login'] = $request->getClientLogin();
        }
        $service = $request->getService();

        $guzzleRequest = $this->createGuzzleRequest($service, $headers, $jsonBody);

        return $this->sendAsync($guzzleRequest)->then(function ($value) use ($serializer) {
            $contents = $value->getBody()->getContents();

            return $serializer->deserialize($contents);
        });
    }

    /**
     * @param mixed $guzzleRequest
     * @return PromiseInterface
     */
    abstract protected function sendAsync($guzzleRequest);

    /**
     * @param $service
     * @param $headers
     * @param $jsonBody
     * @return mixed
     */
    abstract protected function createGuzzleRequest($service, $headers, $jsonBody);


    /**
     * @return array
     */
    protected static function defaultHeaders()
    {
        return [
            'Accept-Language' => 'ru',
            'Content-Type' => 'application/json; charset=utf-8'
        ];
    }
}
