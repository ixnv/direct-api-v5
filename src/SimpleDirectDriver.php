<?php

namespace eLama\DirectApiV5;

use eLama\DirectApiV5\Dto;
use eLama\DirectApiV5\Dto\Ad;
use eLama\DirectApiV5\Dto\AdGroup\AdGroupTypesEnum;
use eLama\DirectApiV5\Dto\Campaign;
use eLama\DirectApiV5\Dto\Campaign\CampaignsSelectionCriteria;
use eLama\DirectApiV5\Dto\Campaign\CampaignStateEnum;
use eLama\DirectApiV5\Dto\Campaign\CampaignTypeEnum;
use eLama\DirectApiV5\Dto\General\GetResultGeneral;
use eLama\DirectApiV5\Dto\General\StateEnum;
use eLama\DirectApiV5\Dto\Keyword;
use eLama\DirectApiV5\Dto\Keyword\KeywordStateEnum;
use eLama\DirectApiV5\LowLevelDriver\LowLevelDriver;
use eLama\DirectApiV5\RequestBody\GetAdGroupsRequestBody;
use eLama\DirectApiV5\RequestBody\GetAdsRequestBody;
use eLama\DirectApiV5\RequestBody\GetCampaignsRequestBody;
use eLama\DirectApiV5\RequestBody\GetKeywordsRequestBody;
use eLama\DirectApiV5\RequestBody\GetRequestBody;
use eLama\DirectApiV5\RequestBody\RequestBody;
use eLama\DirectApiV5\Serializer\JmsSerializer;
use GuzzleHttp\Client;
use GuzzleHttp\Promise\PromiseInterface;
use JMS\Serializer\Serializer;
use Psr\Log\LoggerInterface;

class SimpleDirectDriver
{
    /** @var DtoAwareDirectDriver  */
    private $driver;
    /**
     * @var null
     */
    private $pageLimit;

    /**
     * @param \eLama\DirectApiV5\DtoAwareDirectDriver $driver
     * @param null $pageLimit
     */
    public function __construct(DtoAwareDirectDriver $driver, $pageLimit = null)
    {
        $this->pageLimit = $pageLimit;
        $this->driver = $driver;
    }

    /**
     * Получить незаархивированные текстовые кампании
     * @return PromiseInterface promise of \eLama\DirectApiV5\Dto\Campaign\CampaignGetItem[]
     * @see \eLama\DirectApiV5\Dto\Campaign\CampaignGetItem
     */
    public function getNonArchivedCampaigns()
    {
        $criteria = new CampaignsSelectionCriteria();
        $criteria->setStates(
            [CampaignStateEnum::ON, CampaignStateEnum::ENDED, CampaignStateEnum::SUSPENDED, CampaignStateEnum::OFF]
        );
        $criteria->setTypes([CampaignTypeEnum::TEXT_CAMPAIGN]);

        $getCampaignsRequest = new GetCampaignsRequestBody($criteria);

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

        $getCampaignsRequest = new GetCampaignsRequestBody($criteria);

        return $this->driver->call($getCampaignsRequest)
            ->then(function (Response $response) {
                return $response->getUnserializedBody()->getResult()->getCampaigns()[0];
            });
    }

    /**
     * Получить незаархивированные текстовые объявления
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
        $criteria->setTypes([Ad\AdTypeEnum::TEXT_AD]);

        $getAdsParams = new GetAdsRequestBody($criteria);

        return $this->callGetCollectingItems($getAdsParams);
    }

    /**
     * Получить незаархивированные текстовые объявления
     *
     * @param int[] $campaignIds
     * @return PromiseInterface
     * @see \eLama\DirectApiV5\Dto\Ad\AdGetItem
     */
    public function getAllTextAdGroups(array $campaignIds)
    {
        //Проблема API - не удается получить все объявления не передавая ID кампании
        \Assert\that($campaignIds)->notEmpty()->all()->min(1);

        $criteria = new Dto\AdGroup\AdGroupsSelectionCriteria();
        $criteria->setCampaignIds($campaignIds);
        $criteria->setTypes([AdGroupTypesEnum::TEXT_AD_GROUP]);

        $getAdsParams = new GetAdGroupsRequestBody($criteria);

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

        $getAdsParams = new GetKeywordsRequestBody($criteria);

        return $this->callGetCollectingItems($getAdsParams);
    }

    private function callGetCollectingItems(GetRequestBody $params)
    {
        if ($this->pageLimit) {
            $params->setLimit($this->pageLimit);
        }

        return $this->driver->callGetCollectingItems($params);
    }
}
