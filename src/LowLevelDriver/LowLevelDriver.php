<?php

namespace eLama\DirectApiV5\LowLevelDriver;

use eLama\DirectApiV5\Request;
use eLama\DirectApiV5\Response;
use eLama\DirectApiV5\Serializer\Serializer;
use eLama\DirectApiV5\UnitsInfo;
use GuzzleHttp\Client;
use Psr\Log\LoggerInterface;

class LowLevelDriver implements LowLevelDriverInterface
{
    const URL_SANDBOX = 'https://api-sandbox.direct.yandex.com/json/v5';
    const URL_PRODUCTION = 'https://api.direct.yandex.com/json/v5';
    const HEADER_CLIENT_LOGIN = 'Client-Login';
    const HEADER_AGENCY_UNITS = 'Use-Operator-Units';

    /** @var  GuzzleAdapter; */
    protected $client;

    private $baseUrl = self::URL_SANDBOX;

    /** @var LoggerInterface */
    private $logger;

    public static function createAdapterForClient(Client $client, LoggerInterface $logger, $baseUrl = self::URL_PRODUCTION)
    {
        if (version_compare($client::VERSION, '6', 'ge')) {
            return new static(new Guzzle6Adapter($client), $logger, $baseUrl);
        } else {
            return new static(new Guzzle5Adapter($client), $logger, $baseUrl);
        }
    }

    public function __construct(GuzzleAdapter $guzzleWrapper, LoggerInterface $logger, $baseUrl = self::URL_PRODUCTION)
    {
        $this->client = $guzzleWrapper;
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
        $headers = $this->createHeaders($request);

        $startTime = microtime(true);
        return $this->client->sendAsync($url, $headers, $requestBodyInJson)
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

                $unitsContext = $this->createUnitsContext($directResponse, $request->usesAgencyUnits());

                /**
                 * Данный способ измерения времени крайне ненадежный
                 * в случае выполнения нескольких запросов в параллели,
                 * но лучше варианта не нашел
                 *
                 * TODO dice4x4 Можно использовать массив для сохранения контекста
                 * и уникальный идентификатор запроса либо Symfony Stopwatch
                 *
                 */
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
     * @param Request $request
     *
     * @return array
     */
    private function createHeaders(Request $request)
    {
        $headers = [
            'Accept-Language' => 'ru',
            'Content-Type' => 'application/json; charset=utf-8',
            'Authorization' => 'Bearer ' . $request->getToken(),
        ];

        if ($request->getClientLogin()) {
            $headers[self::HEADER_CLIENT_LOGIN] = $request->getClientLogin();
        }

        if($request->usesAgencyUnits()) {
            $headers[self::HEADER_AGENCY_UNITS] = 'true';
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
            'agencyUnitsUsed' => $request->usesAgencyUnits()
        ];

        return $context;
    }

    /**
     * @param Response $response
     * @param bool $isUseAgencyUnits
     *
     * @return array
     */
    private function createUnitsContext(Response $response, $isUseAgencyUnits = false)
    {
        $unitsInfo = $response->getUnits();
        if (!$unitsInfo) {
            return [];
        }
        $prefix = $isUseAgencyUnits ? 'agency_' : '';
        return [
            "response_${prefix}units_taken" => $unitsInfo->getTaken(),
            "response_${prefix}units_left" => $unitsInfo->getLeft(),
            "response_${prefix}units_dailyLimit" => $unitsInfo->getDailyLimit(),
            "response_${prefix}units_percentLeft" => round($unitsInfo->getLeft()/$unitsInfo->getDailyLimit() * 100, 1)
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
