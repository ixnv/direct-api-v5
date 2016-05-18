<?php

namespace eLama\DirectApiV5;

use eLama\DirectApiV5\Dto;
use eLama\DirectApiV5\Dto\Campaign;
use eLama\DirectApiV5\Dto\Campaign\CampaignsSelectionCriteria;
use eLama\DirectApiV5\LowLevelDriver\LowLevelDriver;
use eLama\DirectApiV5\Params\GetCampaignsParams;
use eLama\DirectApiV5\Params\Params;
use eLama\DirectApiV5\Serializer\JmsSerializer;
use GuzzleHttp\Client;
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

        return $this->call($getCampaignsRequest)
            ->then(function (Response $response) {
                return $response->getResult();
            });
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

        $serializer = new JmsSerializer($this->serializer, $request->resultClass());

        return LowLevelDriver::createAdapterForClient($this->client)
            ->execute($directRequest, $serializer)
            ->then(function (Response $response) use ($directRequest) {
                /** @var Campaign\GetOperationResponse $result */
                $result = $response->getResult();
                if ($result->getError()) {
                    ErrorException::throwFromError($result->getError(), $directRequest, $response);
                }

                return $response;
            });
    }
}
