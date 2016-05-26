<?php

namespace eLama\DirectApiV5;

use eLama\DirectApiV5\Dto;
use eLama\DirectApiV5\Dto\Campaign;
use eLama\DirectApiV5\Dto\Campaign\CampaignsSelectionCriteria;
use eLama\DirectApiV5\Dto\Campaign\CampaignStateEnum;
use eLama\DirectApiV5\Dto\Ad;
use eLama\DirectApiV5\Dto\Keyword;
use eLama\DirectApiV5\Dto\General\StateEnum;
use eLama\DirectApiV5\Dto\Keyword\KeywordStateEnum;
use eLama\DirectApiV5\LowLevelDriver\LowLevelDriver;
use eLama\DirectApiV5\Params\GetAdsParams;
use eLama\DirectApiV5\Params\GetCampaignsParams;
use eLama\DirectApiV5\Params\GetKeywordsParams;
use eLama\DirectApiV5\Params\GetParams;
use eLama\DirectApiV5\Params\Params;
use eLama\DirectApiV5\Result\GetResultGeneral;
use eLama\DirectApiV5\Serializer\JmsSerializer;
use GuzzleHttp\Client;
use GuzzleHttp\Promise\PromiseInterface;
use JMS\Serializer\Serializer;
use Psr\Log\LoggerInterface;


//TODO Получать только текстовые кампании, объявления, ключевики
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
     * @var null
     */
    private $pageLimit;

    /**
     * @param Serializer $jmsSerializer
     * @param Client $client
     */
    public function __construct(
        Serializer $jmsSerializer,
        Client $client,
        LoggerInterface $logger,
        $baseUrl,
        $token,
        $login,
        $pageLimit = null
    ) {
        $this->serializer = $jmsSerializer;
        $this->login = $login;
        $this->token = $token;
        $this->driver = LowLevelDriver::createAdapterForClient($client, $logger, $baseUrl);
        $this->pageLimit = $pageLimit;
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

        return $this->callGetCollectingItems($getCampaignsRequest);
    }

    /**
     * @param int $id
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

    /**
     * @return PromiseInterface
     * @see \eLama\DirectApiV5\Dto\Ad\AdGetItem
     */
    public function getNonArchivedAds(array $campaignIds)
    {
        //Проблема API - не удается получить все объявления не передавая ID кампании
        \Assert\that($campaignIds)->notEmpty();

        $criteria = new Dto\Ad\AdsSelectionCriteria();
        $criteria->setCampaignIds($campaignIds);
        $criteria->setStates(
            [StateEnum::ON, StateEnum::OFF_BY_MONITORING, StateEnum::SUSPENDED, StateEnum::OFF]
        );

        $getAdsParams = new GetAdsParams($criteria);

        return $this->callGetCollectingItems($getAdsParams);
    }

    /**
     * @param int[] $campaignIds
     * @return PromiseInterface
     * @see \eLama\DirectApiV5\Dto\Keyword\KeywordGetItem
     */
    public function getNonArchivedKeywords(array $campaignIds)
    {
        // Проблема API - не удается получить все ключевики не передавая ID кампании
        \Assert\that($campaignIds)->notEmpty();

        $criteria = new Dto\Keyword\KeywordsSelectionCriteria();
        $criteria->setCampaignIds($campaignIds);
        $criteria->setStates(
            [KeywordStateEnum::ON, KeywordStateEnum::SUSPENDED, KeywordStateEnum::OFF]
        );

        $getAdsParams = new GetKeywordsParams($criteria);

        return $this->callGetCollectingItems($getAdsParams);
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

    private function callGet(GetParams $params)
    {
        if ($this->pageLimit) {
            $params->setLimit($this->pageLimit);
        }

        return $this->call($params)
            ->then(function (Response $response) use ($params) {
                /** @var GetResultGeneral $result */
                $result = $response->getUnserializedBody()->getResult();

                if ($result->getLimitedBy()) {
                    return $this->callGet($params->paramsForNextPage($result))
                        ->then(function (array $responses) use ($response) {
                            /** @var Response[] $responses */
                            array_unshift($responses, $response);

                            return $responses;
                        });
                } else {
                    return [$response];
                }
            });
    }

    private function callGetCollectingItems(GetParams $params)
    {
        return $this->callGet($params)
            ->then(function (array $responses) {
                /** @var Response[] $responses */
                $return = [];
                foreach ($responses as $response) {
                    /** @var GetResultGeneral $result */
                    $result = $response->getUnserializedBody()->getResult();
                    foreach ($result->getItems() as $item) {
                        $return[] = $item;
                    }
                }

                return $return;
            });
    }
}
