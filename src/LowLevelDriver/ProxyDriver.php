<?php

namespace eLama\DirectApiV5\LowLevelDriver;

use eLama\DirectApiV5\Request;
use eLama\DirectApiV5\Response;
use eLama\DirectApiV5\Serializer\Serializer;
use GuzzleHttp\Client;

class ProxyDriver implements ProxyDriverInterface
{
    /** @var  GuzzleAdapter */
    private $guzzleAdapter;

    /** @var string */
    private $baseUrl;

    const HEADER_CLIENT_LOGIN = 'Client-Login';

    /** @var int */
    private $cacheControlMaxAge;

    /**
     * @param Client $client
     * @param string $baseUrl
     * @param int $cacheControlMaxAge
     * @return ProxyDriver
     */
    public static function createAdapterForClient(Client $client, $baseUrl, $cacheControlMaxAge)
    {
        if (version_compare($client::VERSION, '6', 'ge')) {
            return new static(new Guzzle6Adapter($client), $baseUrl, $cacheControlMaxAge);
        } else {
            return new static(new Guzzle5Adapter($client), $baseUrl, $cacheControlMaxAge);
        }
    }

    /**
     * @param GuzzleAdapter $guzzleAdapter
     * @param string $baseUrl
     * @param int $cacheControlMaxAge
     */
    public function __construct(GuzzleAdapter $guzzleAdapter, $baseUrl, $cacheControlMaxAge = 300)
    {
        $this->guzzleAdapter = $guzzleAdapter;
        $this->baseUrl = $baseUrl;
        $this->cacheControlMaxAge = $cacheControlMaxAge;
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

        $requestBodyInJson = $serializer->serialize($body);


        $url = $this->baseUrl . '/' . $request->getService() . '/' . $request->getMethod();
        $headers = $this->createHeaders($request->getToken(), $request->getClientLogin());

        return $this->guzzleAdapter->sendAsync($url, $headers, $requestBodyInJson)
            ->then(function ($response) use ($serializer) {
                $contents = $response->getBody()->getContents();


                $deserializedBody = $serializer->deserialize($contents);

                $directResponse = new Response(
                    $deserializedBody
                );

                return $directResponse;
            });
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function canHandleRequest(Request $request)
    {
        return $request->getMethod() === 'get' && in_array($request->getService(), ['campaigns', 'ads'], true);
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
            'Cache-Control' => 'max-age=' . $this->cacheControlMaxAge
        ];

        if ($clientLogin) {
            $headers[self::HEADER_CLIENT_LOGIN] = $clientLogin;
        }

        return $headers;
    }

}
