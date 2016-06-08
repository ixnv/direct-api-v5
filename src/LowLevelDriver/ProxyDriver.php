<?php

namespace eLama\DirectApiV5\LowLevelDriver;

use eLama\DirectApiV5\Request;
use eLama\DirectApiV5\Response;
use eLama\DirectApiV5\Serializer\Serializer;

class ProxyDriver implements LowLevelDriverInterface
{
    /** @var  GuzzleAdapter */
    private $guzzleAdapter;

    /** @var string */
    private $baseUrl;

    const HEADER_CLIENT_LOGIN = 'Client-Login';

    /**
     * @param GuzzleAdapter $guzzleAdapter
     */
    public function __construct(GuzzleAdapter $guzzleAdapter, $baseUrl)
    {
        $this->guzzleAdapter = $guzzleAdapter;
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
        return $request->getMethod() === 'get' && $request->getService() === 'campaigns';
    }

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

}
