<?php

namespace eLama\DirectApiV5;

use eLama\DirectApiV5\Dto;
use eLama\DirectApiV5\Dto\Campaign;
use eLama\DirectApiV5\Dto\Campaign\CampaignsSelectionCriteria;
use eLama\DirectApiV5\RequestResponse\GeneralRequest;
use eLama\DirectApiV5\RequestResponse\GetCampaignsRequest;
use eLama\DirectApiV5\RequestResponse\GetRequestGeneral;
use GuzzleHttp\Client;
use GuzzleHttp\Message\Request;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Promise\PromiseInterface;
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

        $getCampaignsRequest = new GetCampaignsRequest($criteria);

        return $this->call($getCampaignsRequest);
    }

    private function call(GeneralRequest $request)
    {
        $guzzleRequest = $this->createRequestBuilder()
            ->setLogin($this->login)
            ->setToken($this->token)
            ->setRequestDto($request)
            ->getRequest();

        $promise = $this->callAsync($guzzleRequest);

        return $promise->then(
            function ($value) use ($request) {
                $contents = $value->getBody()->getContents();

                return $this->serializer->deserialize($contents, $request->resultClass(), 'json');
            }
        );
    }

    private function createRequestBuilder()
    {
        return new RequestBuilder($this->serializer);
    }

    /**
     * @param \GuzzleHttp\Message\Request|\GuzzleHttp\Psr7\Request $guzzleRequest
     * @return PromiseInterface
     */
    private function callAsync($guzzleRequest)
    {
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
}
