<?php

namespace eLama\DirectApiV5;

use eLama\DirectApiV5\Dto;
use eLama\DirectApiV5\Dto\Campaign;
use eLama\DirectApiV5\Dto\Campaign\CampaignsSelectionCriteria;
use eLama\DirectApiV5\Dto\Campaign\CampaignStateEnum;
use eLama\DirectApiV5\LowLevelDriver\LowLevelDriver;
use eLama\DirectApiV5\Params\GetCampaignsParams;
use eLama\DirectApiV5\Params\Params;
use eLama\DirectApiV5\Serializer\JmsSerializer;
use GuzzleHttp\Client;
use GuzzleHttp\Promise\PromiseInterface;
use JMS\Serializer\Serializer;
use Psr\Log\LoggerInterface;

class SimpleDirectDriver
{
    /** @var string */
    private $login;

    /** @var string */
    private $token;

    /** @var Serializer */
    private $serializer;

    /** @var LowLevelDriver  */
    private $driver;

    /**
     * @param Serializer $jmsSerializer
     * @param Client $client
     */
    public function __construct(Serializer $jmsSerializer, Client $client, LoggerInterface $logger, $baseUrl, $token, $login)
    {
        $this->serializer = $jmsSerializer;
        $this->login = $login;
        $this->token = $token;
        $this->driver = LowLevelDriver::createAdapterForClient($client, $logger, $baseUrl);
    }

    /**
     * @return PromiseInterface promise of \eLama\DirectApiV5\Dto\General\OperationResponse
     * @deprecated
     */
    public function getCampaigns()
    {
        $criteria = new CampaignsSelectionCriteria();

        $getCampaignsRequest = new GetCampaignsParams($criteria);

        //TODO Проблема с лимитом кампаний в 1000 штук - клиенту придется разбираться самому
        return $this->call($getCampaignsRequest)
            ->then(function (Response $response) {
                return $response->getUnserializedBody();
            });
    }

    /**
     * @return PromiseInterface promise of \eLama\DirectApiV5\Dto\Campaign\CampaignGetItem[]
     */
    public function getNonArchivedCampaigns()
    {
        $criteria = new CampaignsSelectionCriteria();
        $criteria->setStates(
            [CampaignStateEnum::ON, CampaignStateEnum::ENDED, CampaignStateEnum::SUSPENDED, CampaignStateEnum::OFF]
        );

        $getCampaignsRequest = new GetCampaignsParams($criteria);

        //TODO Проблема с лимитом кампаний в 1000 штук - нужно будет решить
        return $this->call($getCampaignsRequest)
            ->then(function (Response $response) {
                /** @var Campaign\GetResponse $result */
                $result = $response->getUnserializedBody()->getResult();

                return $result->getCampaigns();
            });
    }

    /**
     * @param $id
     * @return PromiseInterface on \eLama\DirectApiV5\Dto\Campaign\CampaignGetItem
     * @see \eLama\DirectApiV5\Dto\Campaign\CampaignGetItem
     */
    public function getCampaign($id)
    {
        $criteria = new CampaignsSelectionCriteria();
        $criteria->setIds([$id]);

        $getCampaignsRequest = new GetCampaignsParams($criteria);

        return $this->call($getCampaignsRequest)
            ->then(function (Response $response) {
                return $response->getUnserializedBody()->getResult()->getCampaigns()[0];
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

        return $this->driver
            ->execute($directRequest, $serializer)
            ->then(function (Response $response) use ($directRequest) {
                /** @var Campaign\GetOperationResponse $result */
                $result = $response->getUnserializedBody();
                if ($result->getError()) {
                    ErrorException::throwFromError($result->getError(), $directRequest, $response);
                }

                return $response;
            });
    }
}
