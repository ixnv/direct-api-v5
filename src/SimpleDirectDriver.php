<?php

namespace eLama\DirectApiV5;

use eLama\DirectApiV5\Dto;
use eLama\DirectApiV5\Dto\Ad;
use eLama\DirectApiV5\Dto\Ad\AdUpdateItem;
use eLama\DirectApiV5\Dto\AdGroup\AdGroupTypesEnum;
use eLama\DirectApiV5\Dto\Campaign;
use eLama\DirectApiV5\Dto\Campaign\CampaignsSelectionCriteria;
use eLama\DirectApiV5\Dto\Campaign\CampaignStateEnum;
use eLama\DirectApiV5\Dto\Campaign\CampaignTypeEnum;
use eLama\DirectApiV5\Dto\General\IdsCriteria;
use eLama\DirectApiV5\Dto\General\StateEnum;
use eLama\DirectApiV5\Dto\General\StatusEnum;
use eLama\DirectApiV5\Dto\Keyword;
use eLama\DirectApiV5\Dto\Keyword\KeywordStateEnum;
use eLama\DirectApiV5\Dto\Sitelink;
use eLama\DirectApiV5\Dto\Sitelink\SitelinksSetAddItem;
use eLama\DirectApiV5\LowLevelDriver\LowLevelDriver;
use eLama\DirectApiV5\RequestBody\AddSitelinkRequestBody;
use eLama\DirectApiV5\RequestBody\GetAdGroupsRequestBody;
use eLama\DirectApiV5\RequestBody\GetAdsRequestBody;
use eLama\DirectApiV5\RequestBody\GetCampaignsRequestBody;
use eLama\DirectApiV5\RequestBody\GetKeywordsRequestBody;
use eLama\DirectApiV5\RequestBody\GetRequestBody;
use eLama\DirectApiV5\RequestBody\GetSitelinkRequestBody;
use eLama\DirectApiV5\RequestBody\UpdateAdRequestBody;
use GuzzleHttp\Client;
use GuzzleHttp\Promise\PromiseInterface;
use JMS\Serializer\Serializer;
use Psr\Log\LoggerInterface;

class SimpleDirectDriver
{
    /** @var DtoAwareDirectDriver  */
    private $driver;

    /** @var int|null */
    private $pageLimit;

    /**
     * @param Serializer $jmsSerializer
     * @param Client $client
     * @param LoggerInterface $logger
     * @param string $baseUrl
     * @param string $token
     * @param string $login
     * @param int|null $pageLimit
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
        $lowLevelDriver = LowLevelDriver::createAdapterForClient($client, $logger, $baseUrl);
        $this->driver = new DtoAwareDirectDriver($jmsSerializer, $lowLevelDriver, $token, $login);
        $this->pageLimit = $pageLimit;
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
     * @param int[] $campaignIds
     * @return PromiseInterface
     * @see \eLama\DirectApiV5\Dto\Ad\AdGetItem
     */
    public function getNonArchivedAds(array $campaignIds, $acceptedOrOnModeration = false)
    {
        //Проблема API - не удается получить все объявления не передавая ID кампании
        \Assert\that($campaignIds)->notEmpty();

        $criteria = new Dto\Ad\AdsSelectionCriteria();
        $criteria->setCampaignIds($campaignIds);
        $criteria->setStates(
            [StateEnum::ON, StateEnum::OFF_BY_MONITORING, StateEnum::SUSPENDED, StateEnum::OFF]
        );
        
        if ($acceptedOrOnModeration) {
            $criteria->setStatuses(
                [StatusEnum::MODERATION, StatusEnum::PREACCEPTED, StatusEnum::ACCEPTED]
            );
        }
        
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

    /**
     * @param Ad\AdUpdateItem[] $ads
     * @return PromiseInterface
     * @see UpdateResult
     */
    public function updateAds(array $ads)
    {
        \Assert\thatAll($ads)->isInstanceOf(AdUpdateItem::class);

        $request = new UpdateAdRequestBody(
            new Ad\UpdateRequest($ads)
        );

        return $this->driver->call($request);
    }

    /**
     * @param int[] $sitelinksSetIds
     * @return PromiseInterface
     * @see GetResponseBody
     */
    public function getSitelinksSets(array $sitelinksSetIds)
    {
        \Assert\that($sitelinksSetIds)->notEmpty();

        $requestBody = new GetSitelinkRequestBody(
            (new IdsCriteria())->setIds($sitelinksSetIds)
        );

        return $this->driver->call($requestBody);
    }

    /**
     * @param SitelinksSetAddItem[] $sitelinksSets
     * @return PromiseInterface
     * @see AddResponseBody
     */
    public function addSitelinksSets(array $sitelinksSets)
    {
        \Assert\thatAll($sitelinksSets)->isInstanceOf(SitelinksSetAddItem::class);

        $requestBody = new AddSitelinkRequestBody(new Sitelink\AddRequest($sitelinksSets));

        return $this->driver->call($requestBody);
    }
    
    private function callGetCollectingItems(GetRequestBody $params)
    {
        if ($this->pageLimit) {
            $params->setLimit($this->pageLimit);
        }

        return $this->driver->callGetCollectingItems($params);
    }
}
