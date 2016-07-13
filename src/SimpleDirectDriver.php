<?php

namespace eLama\DirectApiV5;

use eLama\DirectApiV5\Dto;
use eLama\DirectApiV5\Dto\Ad;
use eLama\DirectApiV5\Dto\Ad\AdUpdateItem;
use eLama\DirectApiV5\Dto\Campaign;
use eLama\DirectApiV5\Dto\Keyword;
use eLama\DirectApiV5\Dto\Sitelink;
use eLama\DirectApiV5\Dto\Sitelink\SitelinksSetAddItem;
use eLama\DirectApiV5\LowLevelDriver\LowLevelDriver;
use eLama\DirectApiV5\Service\AdGroupService;
use eLama\DirectApiV5\Service\AdService;
use eLama\DirectApiV5\Service\CampaignService;
use eLama\DirectApiV5\Service\KeywordService;
use eLama\DirectApiV5\Service\SitelinkService;
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
     * @deprecated нужно использовать CampaignService напрямую
     * @return PromiseInterface promise of \eLama\DirectApiV5\Dto\Campaign\CampaignGetItem[]
     * @see \eLama\DirectApiV5\Dto\Campaign\CampaignGetItem
     */
    public function getNonArchivedCampaigns()
    {
        $campaignService = new CampaignService($this->driver);
        return $campaignService->getNonArchivedCampaigns($this->pageLimit);
    }

    /**
     * @deprecated нужно использовать CampaignService напрямую
     * @param int $id
     * @return PromiseInterface
     * @see \eLama\DirectApiV5\Dto\Campaign\CampaignGetItem
     */
    public function getCampaign($id)
    {
        $campaignService = new CampaignService($this->driver);
        return $campaignService->getCampaign($id);
    }

    /**
     * Получить незаархивированные текстовые объявления
     * @deprecated нужно использовать AdService напрямую
     * @param int[] $campaignIds
     * @return PromiseInterface
     * @see \eLama\DirectApiV5\Dto\Ad\AdGetItem
     */
    public function getNonArchivedAds(array $campaignIds, $acceptedOrOnModeration = false)
    {
        $adService = new AdService($this->driver);
        return $adService->getNonArchivedAds($campaignIds, $acceptedOrOnModeration, $this->pageLimit);
    }

    /**
     * Получить незаархивированные текстовые объявления
     * @deprecated нужно использовать AdGroupService напрямую
     * @param int[] $campaignIds
     * @return PromiseInterface
     * @see \eLama\DirectApiV5\Dto\Ad\AdGetItem
     */
    public function getAllTextAdGroups(array $campaignIds)
    {
        $adGroupService = new AdGroupService($this->driver);
        return $adGroupService->getAllTextAdGroups($campaignIds, $this->pageLimit);
    }

    /**
     * @deprecated нужно использовать KeywordService напрямую
     * @param int[] $campaignIds
     * @return PromiseInterface
     * @see \eLama\DirectApiV5\Dto\Keyword\KeywordGetItem
     */
    public function getNonArchivedKeywords(array $campaignIds)
    {
        $keywordService = new KeywordService($this->driver);
        return $keywordService->getNonArchivedKeywords($campaignIds, $this->pageLimit);
    }

    /**
     * @deprecated нужно использовать AdService напрямую
     * @param AdUpdateItem[] $ads
     * @return PromiseInterface
     * @see UpdateResult
     */
    public function updateAds(array $ads)
    {
        $adService = new AdService($this->driver);
        return $adService->updateAds($ads);
    }

    /**
     * @deprecated нужно использовать SitelinkService напрямую
     * @param int[] $sitelinksSetIds
     * @return PromiseInterface
     * @see GetResponseBody
     */
    public function getSitelinksSets(array $sitelinksSetIds)
    {
        $sitelinkService = new SitelinkService($this->driver);

        return $sitelinkService->getSitelinksSets($sitelinksSetIds);
    }

    /**
     * @deprecated нужно использовать SitelinkService напрямую
     * @param SitelinksSetAddItem[] $sitelinksSets
     * @return PromiseInterface
     * @see AddResponseBody
     */
    public function addSitelinksSets(array $sitelinksSets)
    {
        $sitelinkService = new SitelinkService($this->driver);

        return $sitelinkService->addSitelinksSets($sitelinksSets);
    }
}
