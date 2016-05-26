<?php

namespace eLama\DirectApiV5\Test\Integration;

use eLama\DirectApiV5\Dto\Ad\AdGetItem;
use eLama\DirectApiV5\Dto\Keyword\KeywordGetItem;
use eLama\DirectApiV5\LoggerFactory;
use eLama\DirectApiV5\SimpleDirectDriver;
use eLama\DirectApiV5\SimpleDirectDriverFactory;
use eLama\DirectApiV5\Dto\Campaign\CampaignGetItem;
use eLama\DirectApiV5\Dto\Campaign\GetOperationResponse;
use eLama\DirectApiV5\ErrorException;
use eLama\DirectApiV5\JmsFactory;
use eLama\DirectApiV5\LowLevelDriver\LowLevelDriver;
use GuzzleHttp\Client;
use Monolog\Logger;
use PHPUnit_Framework_TestCase;
use Psr\Log\NullLogger;

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
     * Их можно автоматом сгенерить в управлении песочницей в Директе.
     *
     * @return int[] Массив ID существующих кампаний
     */
    public function canGetNonArchivedCampaigns()
    {
        $directDriver = $this->createDriver();

        /** @var CampaignGetItem[] $campaigns */
        $campaigns = $directDriver->getNonArchivedCampaigns()->wait();

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
        $directDriver = $this->createDriverWithPageLimit($pageLimit = 1);

        /** @var CampaignGetItem[] $campaigns */
        $campaigns = $directDriver->getNonArchivedCampaigns()->wait();

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

        $directDriver = $this->createDriver();

        /** @var CampaignGetItem $campaign */
        $campaign = $directDriver->getCampaign($campaignId)->wait();

        assertThat($campaign->getId(), is(equalTo($campaignId)));
    }


    /**
     * @test
     * @depends canGetNonArchivedCampaigns
     */
    public function canGetNonArchivedAds()
    {
        /** @var AdGetItem[] $ads */
        $ads = $this->createDriver()->getNonArchivedAds(self::$existingCampaigns)->wait();

        assertThat(
            $ads,
            both(arrayWithSize(greaterThan(0)))
                ->andAlso(everyItem(anInstanceOf(AdGetItem::class)))
        );
    }

    /**
     * @test
     */
    public function getNonArchivedAds_EmptyCampaignList_ThrowsInvalidArgumentException()
    {
        $driver = $this->createDriver();

        $this->setExpectedException(\InvalidArgumentException::class);
        $driver->getNonArchivedAds([]);
    }

    /**
     * @test
     */
    public function invalidToken_ThrowsException()
    {
        $directDriver = $this->createDriver('invalid token');

        /** @var GetOperationResponse $campaigns */
        $this->setExpectedException(ErrorException::class);
        $directDriver->getNonArchivedCampaigns()->wait();
    }

    /**
     * @test
     * @depends canGetNonArchivedCampaigns
     */
    public function canGetNonArchivedKeywords()
    {
        /** @var AdGetItem[] $ads */
        $ads = $this->createDriver()->getNonArchivedKeywords([self::$existingCampaigns[0]])->wait();

        assertThat(
            $ads,
            both(arrayWithSize(greaterThan(0)))
                ->andAlso(everyItem(anInstanceOf(KeywordGetItem::class)))
        );
    }

    /**
     * @test
     */
    public function getNonArchivedKeywords_EmptyCampaignList_ThrowsInvalidArgumentException()
    {
        $driver = $this->createDriver();

        $this->setExpectedException(\InvalidArgumentException::class);
        $driver->getNonArchivedKeywords([]);
    }


    /**
     * @param string $token
     * @return SimpleDirectDriver
     */
    private function createDriver($token = self::TOKEN)
    {
        $serializer = JmsFactory::create()->serializer();
        $client = new Client();

        $tokenResolver = function () use ($token) {
            return $token;
        };

        $factory = new SimpleDirectDriverFactory($serializer, $client, new LoggerFactory([]), $tokenResolver, LowLevelDriver::URL_SANDBOX);

        return $factory->driverForClient(self::LOGIN);
    }

    /**
     * @param $pageLimit
     * @return SimpleDirectDriver
     */
    private function createDriverWithPageLimit($pageLimit)
    {
        return $directDriver = new SimpleDirectDriver(
            JmsFactory::create()->serializer(),
            new Client(),
            (new LoggerFactory([]))->create(),
            LowLevelDriver::URL_SANDBOX,
            self::TOKEN,
            self::LOGIN,
            $pageLimit
        );
    }

}
