<?php

namespace eLama\DirectApiV5\LowLevelDriver;

use eLama\DirectApiV5\Request;
use eLama\DirectApiV5\Response;
use eLama\DirectApiV5\Serializer\Serializer;
use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Promise\PromiseInterface;

abstract class LowLevelDriver
{
    const URL_SANDBOX = 'https://api-sandbox.direct.yandex.com/json/v5';
    const URL_PRODUCTION = 'https://api.direct.yandex.com/json/v5';
    /** @var  \GuzzleHttp\Client; */
    protected $client;

    private $baseUrl = self::URL_SANDBOX;

    public static function createAdapterForClient(\GuzzleHttp\Client $client, $baseUrl = self::URL_PRODUCTION)
    {
        if (version_compare($client::VERSION, '6', 'ge')) {
            return new Guzzle6LowLevelDriver($client, $baseUrl);
        } else {
            return new Guzzle5LowLevelDriver($client, $baseUrl);
        }
    }

    public function __construct(\GuzzleHttp\Client $client, $baseUrl = self::URL_PRODUCTION)
    {
        $this->client = $client;
        $this->baseUrl = $baseUrl;
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

        $headers = $this->createHeaders($request->getToken(), $request->getClientLogin());

        $url = $this->baseUrl . '/' . $request->getService();

        return $this->sendAsync($url, $headers, $serializer->serialize($body))->then(function ($value) use ($serializer) {
            $contents = $value->getBody()->getContents();

            $deserializedBody = $serializer->deserialize($contents);

            return new Response($deserializedBody);
        });
    }

    /**
     * @param mixed $guzzleRequest
     * @return PromiseInterface
     */
    abstract protected function sendAsync($url, $headers, $jsonBody);

    /**
     * @return array
     */
    private function createHeaders($token, $clientLogin = null)
    {
        $headers = [
            'Accept-Language' => 'ru',
            'Content-Type' => 'application/json; charset=utf-8',
            'Authorization' => 'Bearer ' . $token
        ];

        if ($clientLogin) {
            $headers['Client-Login'] = $clientLogin;
        }

        return $headers;
    }
}
