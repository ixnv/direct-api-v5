<?php

namespace eLama\DirectApiV5\LowLevelDriver;

use eLama\DirectApiV5\Request;
use eLama\DirectApiV5\Response;
use eLama\DirectApiV5\Serializer\Serializer;
use eLama\DirectApiV5\UnitsInfo;
use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Log\LoggerInterface;

abstract class LowLevelDriver implements LowLevelDriverInterface
{
    const URL_SANDBOX = 'https://api-sandbox.direct.yandex.com/json/v5';
    const URL_PRODUCTION = 'https://api.direct.yandex.com/json/v5';
    const HEADER_CLIENT_LOGIN = 'Client-Login';
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
     * @inheritdoc
     * @see \eLama\DirectApiV5\Response
     */
    public function execute(Request $request, Serializer $serializer)
    {
        $body = [
            'method' => $request->getMethod(),
            'params' => $request->getParams()
        ];
        $uniqId = uniqid('', false);

        $requestBodyInJson = $serializer->serialize($body);

        $this->logger->info("Going to send request", $this->createLogContext($uniqId, $request, $requestBodyInJson));

        $url = $this->baseUrl . '/' . $request->getService();
        $headers = $this->createHeaders($request->getToken(), $request->getClientLogin());

        $startTime = microtime(true);
        return $this->sendAsync($url, $headers, $requestBodyInJson)
            ->then(function ($response) use ($serializer, $uniqId, $request, $requestBodyInJson, $startTime) {
                $contents = $response->getBody()->getContents();
                $endTime = microtime(true);

                $errorContext = [];
                if ($this->isErrorResponse($contents)) {
                    $errorContext = $this->createErrorContext($contents);
                }

                $deserializedBody = $serializer->deserialize($contents);

                $directResponse = new Response(
                    $deserializedBody,
                    $this->getHeaderValue($response, 'requestId'),
                    $this->parseDateHeader($response),
                    $this->parseUnitsHeader($response)
                );

                $requestContext = $this->createLogContext($uniqId, $request, $requestBodyInJson);
                $responseContext = [
                    'response_requestId' => $directResponse->getRequestId(),
                    'response_date' => $directResponse->getDate(),
                    'response_body' => $contents,
                ];

                $unitsContext = $this->createUnitsContext($directResponse);

                /* Данный способ измерения времени крайне ненадежный
                 * в случае выполнения нескольких запросов в параллели,
                 * но лучше варианта не нашел */
                $responseContext['tookInMs'] = (int)(($endTime - $startTime) * 1000);

                $context = array_merge($requestContext, $responseContext, $unitsContext, $errorContext);
                if (count($errorContext) !== 0) {
                    $this->logger->warning(
                        'Received error response',
                        $context
                    );
                } else {
                    $this->logger->info(
                        'Received response',
                        $context
                    );
                }

                return $directResponse;
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
            $headers[self::HEADER_CLIENT_LOGIN] = $clientLogin;
        }

        return $headers;
    }

    /**
     * @param string $uniqId
     * @param Request $request
     * @param string $requestBodyInJson
     * @return array
     */
    private function createLogContext($uniqId, Request $request, $requestBodyInJson)
    {
        $request = $request->withSanitizedToken();

        $context = [
            'callUniqId' => $uniqId,
            'clientLogin' => $request->getClientLogin(),
            'method' => $request->getMethod(),
            'service' => $request->getService(),
            'request_body' => $requestBodyInJson,
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
            'response_units_taken' => $unitsInfo->getTaken(),
            'response_units_left' => $unitsInfo->getLeft(),
            'response_units_dailyLimit' => $unitsInfo->getDailyLimit(),
            'response_units_percentLeft' => round($unitsInfo->getLeft()/$unitsInfo->getDailyLimit() * 100, 1)
        ];
    }

    private function isErrorResponse($contents)
    {
        return strpos($contents, '"error"') !== false && strpos($contents, '"error_code"') !== false;
    }

    /**
     * @param $requestBodyInJson
     * @return array
     */
    private function createErrorContext($requestBodyInJson)
    {
        $errorContext = [];
        $decodedResponse = json_decode($requestBodyInJson, true);
        foreach ($decodedResponse['error'] as $key => $value) {
            if ($key === 'error_code') {
                $value = (int)$value;
            }
            $key = preg_replace('/^error_/', '', $key);
            $errorContext['response_error_' . $key] = $value;
        }

        return $errorContext;
    }
}
