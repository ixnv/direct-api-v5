<?php

namespace eLama\DirectApiV5;

use eLama\DirectApiV5\Dto;
use eLama\DirectApiV5\Dto\Campaign;
use eLama\DirectApiV5\Dto\Campaign\CampaignsSelectionCriteria;
use eLama\DirectApiV5\Params\GetCampaignsParams;
use eLama\DirectApiV5\Params\Params;
use GuzzleHttp\Client;
use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Stream\Stream;
use JMS\Serializer\Serializer;

class DirectDriver
{
    /** @var string */
    private $login;

    /** @var string */
    private $token;

    /** @var Serializer */
    private $serializer;

    /** @var Client */
    private $client;

    /**
     * @param Serializer $jmsSerializer
     * @param Client $client
     */
    public function __construct(Serializer $jmsSerializer, Client $client, $token, $login)
    {
        $this->serializer = $jmsSerializer;
        $this->client = $client;
        $this->login = $login;
        $this->token = $token;
    }

    public function getCampaigns()
    {
        $criteria = new CampaignsSelectionCriteria();

        $getCampaignsRequest = new GetCampaignsParams($criteria);

        return $this->call($getCampaignsRequest);
    }

    private function call(Params $request)
    {

        $directRequest = new Request(
            $this->token,
            $request->resource(),
            $request->method(),
            $request->params(),
            $this->login
        );

        $promise = $this->callAsync($directRequest);

        return $promise->then(
            function ($value) use ($request) {
                $contents = $value->getBody()->getContents();

                return $this->serializer->deserialize($contents, $request->resultClass(), 'json');
            }
        );
    }



    /**
     * @param Request $request
     * @return PromiseInterface
     */
    private function callAsync(Request $request)
    {
        $body = [
            'method' => $request->getMethod(),
            'params' => $request->getParams()
        ];

        $jsonBody = $this->serializer->serialize($body, 'json');

        $majorVersion = explode('.', Client::VERSION)[0];
        $requestClass = $majorVersion == 5 ? '\GuzzleHttp\Message\Request' : '\GuzzleHttp\Psr7\Request';

        $headers = [
            'Authorization' => 'Bearer ' . $request->getToken()
        ];

        if ($request->getClientLogin()) {
            $headers['Client-Login'] = $request->getClientLogin();
        }

        $guzzleRequest = new $requestClass(
            'POST',
            'https://api-sandbox.direct.yandex.com/json/v5/' . $request->getService(),
            array_merge(self::defaultHeaders(), $headers),
            Stream::factory($jsonBody)
        );

        $majorVersion = explode('.', Client::VERSION)[0];

        if ($majorVersion == 5) {
            $guzzleRequest->getConfig()->set('future', true);

            $futureResponse = $this->client->send($guzzleRequest);

            $promise = new Promise(
                function () use ($futureResponse) {
                    $futureResponse->wait();
                },
                function () use ($futureResponse) {
                    $futureResponse->cancel();
                }
            );

            $futureResponse->then(
                function ($result) use ($promise) {
                    $promise->resolve($result);
                },
                function ($reason) use ($promise) {
                    $promise->reject($reason);
                }
            );
        } else {
            $promise = $this->client->sendAsync($guzzleRequest);
        }


        return $promise;
    }

    /**
     * @return array
     */
    private static function defaultHeaders()
    {
        return [
            'Accept-Language' => 'ru',
            'Content-Type' => 'application/json; charset=utf-8'
        ];
    }
}
