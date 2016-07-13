<?php

namespace eLama\DirectApiV5;

use eLama\DirectApiV5\Dto;
use eLama\DirectApiV5\Dto\Ad;
use eLama\DirectApiV5\Dto\Campaign;
use eLama\DirectApiV5\Dto\Keyword;
use eLama\DirectApiV5\Dto\Sitelink;
use eLama\DirectApiV5\LowLevelDriver\LowLevelDriver;
use eLama\DirectApiV5\Service\AdGroupService;
use eLama\DirectApiV5\Service\AdService;
use eLama\DirectApiV5\Service\CampaignService;
use eLama\DirectApiV5\Service\KeywordService;
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

    /** @var CampaignService */
    private $campaignService;

    /** @var AdService */
    private $adService;

    /** @var AdGroupService */
    private $adGroupService;

    /** @var KeywordService */
    private $keywordService;

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
        $this->campaignService = new CampaignService($this->driver);
        $this->adService = new AdService($this->driver);
        $this->adGroupService = new AdGroupService($this->driver);
        $this->keywordService = new KeywordService($this->driver);
        $this->pageLimit = $pageLimit;
    }

    /**
     * Получить незаархивированные текстовые кампании
     * @deprecated
     * @return PromiseInterface promise of \eLama\DirectApiV5\Dto\Campaign\CampaignGetItem[]
     * @see \eLama\DirectApiV5\Dto\Campaign\CampaignGetItem
     */
    public function getNonArchivedCampaigns()
    {
        return $this->campaignService->getNonArchivedCampaigns($this->pageLimit);
    }

    /**
     * @deprecated
     * @param int $id
     * @return PromiseInterface
     * @see \eLama\DirectApiV5\Dto\Campaign\CampaignGetItem
     */
    public function getCampaign($id)
    {
        return $this->campaignService->getCampaign($id);
    }

    /**
     * Получить незаархивированные текстовые объявления
     * @deprecated
     * @param int[] $campaignIds
     * @return PromiseInterface
     * @see \eLama\DirectApiV5\Dto\Ad\AdGetItem
     */
    public function getNonArchivedAds(array $campaignIds, $acceptedOrOnModeration = false)
    {
        return $this->adService->getNonArchivedAds($campaignIds, $acceptedOrOnModeration, $this->pageLimit);
    }

    /**
     * Получить незаархивированные текстовые объявления
     * @deprecated
     * @param int[] $campaignIds
     * @return PromiseInterface
     * @see \eLama\DirectApiV5\Dto\Ad\AdGetItem
     */
    public function getAllTextAdGroups(array $campaignIds)
    {
        return $this->adGroupService->getAllTextAdGroups($campaignIds, $this->pageLimit);
    }

    /**
     * @deprecated
     * @param int[] $campaignIds
     * @return PromiseInterface
     * @see \eLama\DirectApiV5\Dto\Keyword\KeywordGetItem
     */
    public function getNonArchivedKeywords(array $campaignIds)
    {
        return $this->keywordService->getNonArchivedKeywords($campaignIds, $this->pageLimit);
    }
}
