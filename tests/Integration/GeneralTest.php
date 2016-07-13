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

class GeneralTest extends PHPUnit_Framework_TestCase
{
    const LOGIN = 'ra-trinet-add-dev-01';
    const TOKEN = '3fe13d8bd818458c89624f678f365051';

    /** @var int[] */
    private static $existingCampaigns;

    /**
     * @test
     *
     * Чтобы тест работал, в аккаунте должны быть тестовые данные.
     * Их можно автоматом сгенерить в управлении песочницей в Директе (RED-1070).
     *
     * @return int[] Массив ID существующих кампаний
     */
    public function canGetNonArchivedCampaigns()
    {
        $campaignService = $this->createCampaignService();

        /** @var CampaignGetItem[] $campaigns */
        $campaigns = $campaignService->getNonArchivedCampaigns()->wait();

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
        $campaignService = $this->createCampaignService();

        /** @var CampaignGetItem[] $campaigns */
        $campaigns = $campaignService->getNonArchivedCampaigns($pageLimit = 1)->wait();

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

        $campaignService = $this->createCampaignService();

        /** @var CampaignGetItem $campaign */
        $campaign = $campaignService->getCampaign($campaignId)->wait();

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
        $campaignService = $this->createCampaignService('invalid token');

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
     * @param string $token
     * @return CampaignService
     */
    private function createCampaignService($token = self::TOKEN)
    {
        $dtoAwareDirectDriver = $this->createDtoAwareDirectDriver($token);

        return new CampaignService($dtoAwareDirectDriver);
    }

    /**
     * @param string $token
     * @return AdService
     */
    private function createAdService($token = self::TOKEN)
    {
        $dtoAwareDirectDriver = $this->createDtoAwareDirectDriver($token);

        return new AdService($dtoAwareDirectDriver);
    }

    /**
     * @param string $token
     * @return AdGroupService
     */
    private function createAdGroupService($token = self::TOKEN)
    {
        $dtoAwareDirectDriver = $this->createDtoAwareDirectDriver($token);

        return new AdGroupService($dtoAwareDirectDriver);
    }

    /**
     * @param string $token
     * @return KeywordService
     */
    private function createKeywordService($token = self::TOKEN)
    {
        $dtoAwareDirectDriver = $this->createDtoAwareDirectDriver($token);

        return new KeywordService($dtoAwareDirectDriver);
    }

    /**
     * @param string $token
     * @return DtoAwareDirectDriver
     */
    private function createDtoAwareDirectDriver($token)
    {
        $serializer = JmsFactory::create()->serializer();
        $client = new Client();
        $logger = (new LoggerFactory([]))->create(self::class);

        $lowLevelDriver = LowLevelDriver::createAdapterForClient($client, $logger, LowLevelDriver::URL_SANDBOX);

        return new DtoAwareDirectDriver($serializer, $lowLevelDriver, $token, self::LOGIN);
    }
}
