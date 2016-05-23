<?php

namespace eLama\DirectApiV5\LowLevelDriver;

use eLama\DirectApiV5\Request;
use eLama\DirectApiV5\Response;
use eLama\DirectApiV5\Serializer\Serializer;
use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Log\LoggerInterface;

abstract class LowLevelDriver
{
    const URL_SANDBOX = 'https://api-sandbox.direct.yandex.com/json/v5';
    const URL_PRODUCTION = 'https://api.direct.yandex.com/json/v5';
    /** @var  \GuzzleHttp\Client; */
    protected $client;

    private $baseUrl = self::URL_SANDBOX;

    /** @var LoggerInterface */
    private $logger;

    public static function createAdapterForClient(\GuzzleHttp\Client $client, LoggerInterface $logger, $baseUrl = self::URL_PRODUCTION)
    {
        if (version_compare($client::VERSION, '6', 'ge')) {
            return new Guzzle6LowLevelDriver($client, $logger, $baseUrl);
        } else {
            return new Guzzle5LowLevelDriver($client, $logger, $baseUrl);
        }
    }

    public function __construct(\GuzzleHttp\Client $client, LoggerInterface $logger, $baseUrl = self::URL_PRODUCTION)
    {
        $this->client = $client;
        $this->logger = $logger;
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
        $uniqId = uniqid('', false);

        $this->logRequest($uniqId, $request->withSanitizedToken());

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

    /**
     * @param string $uniqId
     * @param Request $request
     */
    private function logRequest($uniqId, Request $request)
    {
        $this->logger->info(
            "Going to send request",
            [
                'uniqId' => $uniqId,
                'clientLogin' => $request->getClientLogin(),
                'method' => $request->getMethod(),
                'service' => $request->getService(),
                'params' => $request->getParams(),
                'token' => $request->getToken(),
            ]
        );
    }
}
