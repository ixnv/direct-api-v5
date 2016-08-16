<?php

namespace eLama\DirectApiV5\LowLevelDriver;

use eLama\DirectApiV5\Request;
use eLama\DirectApiV5\Response;
use eLama\DirectApiV5\Serializer\Serializer;
use GuzzleHttp\Client;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

class ProxyDriver implements ProxyDriverInterface
{
    const HEADER_CLIENT_LOGIN = 'Client-Login';

    /** @var  GuzzleAdapter */
    private $guzzleAdapter;

    /** @var string */
    private $baseUrl;

    /** @var int */
    private $maxCacheSeconds;

    /** @var array */
    private $servicesToProxy;

    /** @var LoggerInterface */
    private $logger;

    /**
     * @param GuzzleAdapter $guzzleAdapter
     * @param LoggerInterface $logger
     * @param string $baseUrl
     * @param int $maxCacheSeconds
     * @param string[] $servicesToProxy
     */
    public function __construct(
        GuzzleAdapter $guzzleAdapter,
        LoggerInterface $logger,
        $baseUrl,
        $maxCacheSeconds = 300,
        array $servicesToProxy = null
    ) {
        $this->guzzleAdapter = $guzzleAdapter;
        $this->baseUrl = $baseUrl;
        $this->maxCacheSeconds = $maxCacheSeconds;

        if ($servicesToProxy === null) {
            $servicesToProxy = ['campaigns'];
        }

        $this->servicesToProxy = $servicesToProxy;
        $this->logger = $logger;
    }

    /**
     * @param Client $client
     * @param LoggerInterface $logger
     * @param string $baseUrl
     * @param int $maxCacheSeconds
     * @return ProxyDriver
     */
    public static function createAdapterForClient(Client $client, LoggerInterface $logger, $baseUrl, $maxCacheSeconds)
    {
        if (version_compare($client::VERSION, '6', 'ge')) {
            return new static(new Guzzle6Adapter($client), $logger, $baseUrl, $maxCacheSeconds);
        } else {
            return new static(new Guzzle5Adapter($client), $logger, $baseUrl, $maxCacheSeconds);
        }
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

        $this->logger->info('Sending request to DirectProxy', [
            'uniqId' => $uniqId,
            'clientLogin' => $request->getClientLogin(),
            'method' => $request->getMethod(),
            'service' => $request->getService(),
            'request' => $requestBodyInJson,
            'token' => $request->getSanitizedToken()
        ]);

        $url = $this->baseUrl . '/' . $request->getService() . '/' . $request->getMethod();
        $headers = $this->createHeaders($request->getToken(), $request->getClientLogin());

        return $this->guzzleAdapter->sendAsync($url, $headers, $requestBodyInJson)
            ->then(function (\GuzzleHttp\Psr7\Response $response) use ($serializer, $uniqId) {
                $contents = $response->getBody()->getContents();

                $deserializedBody = $serializer->deserialize($contents);


                $this->logger->log(
                    $response->getStatusCode() > 200 ? Logger::WARNING : Logger::INFO,
                    'Received response from DirectProxy',
                    [
                        'uniqId' => $uniqId,
                        'response_body' => $contents,
                        'response_status' => $response->getStatusCode(),
                        'response_reason' => $response->getReasonPhrase()
                    ]
                );

                $directResponse = new Response(
                    $deserializedBody
                );

                return $directResponse;
            });
    }

    /**
     * @param string $token
     * @param null|string $clientLogin
     * @return array
     */
    private function createHeaders($token, $clientLogin = null)
    {
        $headers = [
            'Accept-Language' => 'ru',
            'Content-Type' => 'application/json; charset=utf-8',
            'Authorization' => 'Bearer ' . $token,
            'Cache-Control' => 'max-age=' . $this->maxCacheSeconds
        ];

        if ($clientLogin) {
            $headers[self::HEADER_CLIENT_LOGIN] = $clientLogin;
        }

        return $headers;
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function canHandleRequest(Request $request)
    {
        return $request->getMethod() === 'get' && in_array($request->getService(), $this->servicesToProxy, true);
    }

}
