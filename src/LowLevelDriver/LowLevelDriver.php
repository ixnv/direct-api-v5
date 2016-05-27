<?php

namespace eLama\DirectApiV5\LowLevelDriver;

use eLama\DirectApiV5\Request;
use eLama\DirectApiV5\Response;
use eLama\DirectApiV5\Serializer\Serializer;
use eLama\DirectApiV5\UnitsInfo;
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

        //TODO Логгировать после сериализации
        $this->logger->info("Going to send request", $this->createLogContext($uniqId, $request));

        $headers = $this->createHeaders($request->getToken(), $request->getClientLogin());

        $url = $this->baseUrl . '/' . $request->getService();


        $jsonBody = $serializer->serialize($body);
        $startTime = microtime(true);
        $endTime = null;

        return $this->sendAsync($url, $headers, $jsonBody)
            ->then(function ($response) use ($serializer, &$endTime) {
                $contents = $response->getBody()->getContents();
                $endTime = microtime(true);

                $deserializedBody = $serializer->deserialize($contents);

                return new Response(
                    $deserializedBody,
                    $this->getHeaderValue($response, 'requestId'),
                    $this->parseDateHeader($response),
                    $this->parseUnitsHeader($response)
                );
            })
            ->then(function (Response $response) use ($uniqId, $request, $startTime, &$endTime) {

                //TODO Логгировать до сериализации
                $request = $this->createLogContext($uniqId, $request);
                $responseContext = [
                    'response_requestId' => $response->getRequestId(),
                    'response_date' => $response->getDate(),
                    'response_body' => $response->getUnserializedBody(),
                ];

                $unitsContext = $this->createUnitsContext($response);

                $responseContext['tookInMs'] = (int)(($endTime - $startTime) * 1000);

                $this->logger->info(
                    'Received response',
                    array_merge($request, $responseContext, $unitsContext)
                );

                return $response;
            });
    }

    /**
     * @param $request
     * @param $headerName
     * @return string|null
     */
    private function getHeaderValue($request, $headerName)
    {
        $requestIds = (array)$request->getHeader($headerName);

        return array_pop($requestIds);
    }

    private function parseDateHeader($response)
    {
        $dateHeaderValue = $this->getHeaderValue($response, 'date');
        if (!$dateHeaderValue) {
            return null;
        }

        return new \DateTimeImmutable($dateHeaderValue);
    }

    private function parseUnitsHeader($response)
    {
        $unitsValue = $this->getHeaderValue($response, 'units');
        if (!$unitsValue) {
            return null;
        }

        list($took, $left, $dailyLimit) = explode('/', $unitsValue);
        return new UnitsInfo($took, $left, $dailyLimit);
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
     * @return array
     */
    private function createLogContext($uniqId, Request $request)
    {
        $request = $request->withSanitizedToken();

        $context = [
            'callUniqId' => $uniqId,
            'clientLogin' => $request->getClientLogin(),
            'method' => $request->getMethod(),
            'service' => $request->getService(),
            'params' => $request->getParams(),
            'token' => $request->getToken(),
        ];

        return $context;
    }

    /**
     * @param Response $response
     * @return array
     */
    private function createUnitsContext(Response $response)
    {
        $unitsInfo = $response->getUnits();
        if (!$unitsInfo) {
            return [];
        }

        return [
            'units_taken' => $unitsInfo->getTaken(),
            'units_left' => $unitsInfo->getLeft(),
            'units_dailyLimit' => $unitsInfo->getDailyLimit()
        ];
    }
}
