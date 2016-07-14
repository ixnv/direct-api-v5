<?php

namespace eLama\DirectApiV5\Test\Integration;

use eLama\DirectApiV5\Dto\Ad\AdGetItem;
use eLama\DirectApiV5\Dto\AdGroup\AdGroupGetItem;
use eLama\DirectApiV5\Dto\Keyword\KeywordGetItem;
use eLama\DirectApiV5\DtoAwareDirectDriver;
use eLama\DirectApiV5\LoggerFactory;
use eLama\DirectApiV5\Service\AdGroupService;
use eLama\DirectApiV5\Service\AdService;
use eLama\DirectApiV5\Service\CampaignService;
use eLama\DirectApiV5\Service\KeywordService;
use eLama\DirectApiV5\Dto\Campaign\CampaignGetItem;
use eLama\DirectApiV5\ErrorException;
use eLama\DirectApiV5\JmsFactory;
use eLama\DirectApiV5\LowLevelDriver\LowLevelDriver;
use GuzzleHttp\Client;
use PHPUnit_Framework_TestCase;

class GeneralTest extends DirectApiV5TestCase
{
    /** @var int[] */
    private static $existingCampaigns;

    /**
     * @test
     *
     * Чтобы тест работал, в аккаунте должны быть тестовые данные.
     * Их можно автоматом сгенерить в управлении песочницей в Директе.
     *
     * @return int[] Массив ID существующих кампаний
     */
    public function canGetNonArchivedCampaigns()
    {
        /** @var CampaignGetItem[] $campaigns */
        $campaigns = $this->createCampaignService()->getNonArchivedCampaigns()->wait();

        assertThat(
            $campaigns,
            both(arrayWithSize(greaterThan(2)))
              ->andAlso(everyItem(anInstanceOf(CampaignGetItem::class)))
        );

       self::$existingCampaigns = array_map(
            function (CampaignGetItem $campaignGetItem) {
                return $campaignGetItem->getId();
            },
            $campaigns
        );
    }

    /**
     * @test
     * @depends canGetNonArchivedCampaigns
     */
    public function getNonArchivedCampaigns_PageLimitIsSetToOnePerRequest_FetchesAllCampaigns()
    {
        /** @var CampaignGetItem[] $campaigns */
        $campaigns = $this->createCampaignService()->getNonArchivedCampaigns($pageLimit = 1)->wait();

        assertThat(
            $campaigns,
            both(arrayWithSize(count(self::$existingCampaigns)))
              ->andAlso(everyItem(anInstanceOf(CampaignGetItem::class)))
        );
    }

    /**
     * @test
     * @depends canGetNonArchivedCampaigns
     */
    public function canGetCampaign()
    {
        $campaignId = self::$existingCampaigns[0];

        /** @var CampaignGetItem $campaign */
        $campaign = $this->createCampaignService()->getCampaign($campaignId)->wait();

        assertThat($campaign->getId(), is(equalTo($campaignId)));
    }


    /**
     * @test
     * @depends canGetNonArchivedCampaigns
     */
    public function canGetNonArchivedAds()
    {
        $adService = $this->createAdService();

        /** @var AdGetItem[] $ads */
        $ads = $adService->getNonArchivedAds(self::$existingCampaigns)->wait();

        assertThat(
            $ads,
            both(arrayWithSize(greaterThan(0)))
                ->andAlso(everyItem(anInstanceOf(AdGetItem::class)))
        );
    }

    /**
     * @test
     * @depends canGetNonArchivedCampaigns
     */
    public function canGetAllTextAdGroups()
    {
        $adGroupService = $this->createAdGroupService();

        /** @var AdGetItem[] $ads */
        $ads = $adGroupService->getAllTextAdGroups(self::$existingCampaigns)->wait();

        assertThat(
            $ads,
            both(arrayWithSize(greaterThan(0)))
                ->andAlso(everyItem(anInstanceOf(AdGroupGetItem::class)))
        );
    }

    /**
     * @test
     */
    public function getNonArchivedCampaigns_InvalidToken_ThrowsException()
    {
        $campaignService = $this->createCampaignServiceWithInvalidToken();

        $this->setExpectedException(ErrorException::class);
        $campaignService->getNonArchivedCampaigns()->wait();
    }

    /**
     * @test
     * @depends canGetNonArchivedCampaigns
     */
    public function canGetNonArchivedKeywords()
    {
        $keywordService = $this->createKeywordService();

        /** @var AdGetItem[] $keywords */
        $campaignId = self::$existingCampaigns[0];
        $keywords = $keywordService->getNonArchivedKeywords([$campaignId])->wait();

        assertThat(
            $keywords,
            both(arrayWithSize(greaterThan(0)))
                ->andAlso(everyItem(anInstanceOf(KeywordGetItem::class)))
        );

        return [
            'campaignId' => $campaignId,
            'keywordCount' => count($keywords)
        ];
    }

    /**
     * @test
     * @depends canGetNonArchivedKeywords
     */
    public function getNonArchivedKeywords_PageLimitIsSet_FetchesAllKeywords(array $data)
    {
        $keywordService = $this->createKeywordService();

        $campaignId = $data['campaignId'];
        $keywordCount = $data['keywordCount'];
        $pageSize = ceil($keywordCount / 2);

        /** @var CampaignGetItem[] $keywords */
        $keywords = $keywordService->getNonArchivedKeywords([$campaignId], $pageSize)->wait();

        assertThat(
            $keywords,
            both(arrayWithSize($keywordCount))
                ->andAlso(everyItem(anInstanceOf(KeywordGetItem::class)))
        );
    }

    /**
     * @return CampaignService
     */
    private function createCampaignService()
    {
        return new CampaignService(self::createDtoAwareDirectDriver());
    }

    /**
     * @return CampaignService
     */
    private function createCampaignServiceWithInvalidToken()
    {
        return new CampaignService(self::createDtoAwareDirectDriver('invalid token'));
    }

    /**
     * @return AdService
     */
    private function createAdService()
    {
        return new AdService(self::createDtoAwareDirectDriver());
    }

    /**
     * @return AdGroupService
     */
    private function createAdGroupService()
    {
        return new AdGroupService(self::createDtoAwareDirectDriver());
    }

    /**
     * @return KeywordService
     */
    private function createKeywordService()
    {
        return new KeywordService(self::createDtoAwareDirectDriver());
    }
}
