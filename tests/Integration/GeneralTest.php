<?php

namespace eLama\DirectApiV5\Test\Integration;

use eLama\DirectApiV5\SimpleDirectDriver;
use eLama\DirectApiV5\SimpleDirectDriverFactory;
use eLama\DirectApiV5\Dto\Campaign\CampaignGetItem;
use eLama\DirectApiV5\Dto\Campaign\GetOperationResponse;
use eLama\DirectApiV5\ErrorException;
use eLama\DirectApiV5\JmsFactory;
use eLama\DirectApiV5\LowLevelDriver\LowLevelDriver;
use GuzzleHttp\Client;
use PHPUnit_Framework_TestCase;

class GeneralTest extends PHPUnit_Framework_TestCase
{
    const LOGIN = 'ra-trinet-add-dev-01';
    const TOKEN = '3fe13d8bd818458c89624f678f365051';

    /**
     * @test
     *
     * Чтобы тест работал, в аккаунте должны быть тестовые данные.
     * Их можно автоматом сгенерить в управлении песочницей в Директе.
     *
     * @return int[] Массив ID существующих кампаний
     */
    public function canGetCampaigns()
    {
        $directDriver = $this->createDriver();

        /** @var GetOperationResponse $campaigns */
        $campaigns = $directDriver->getCampaigns()->wait();

        assertThat($campaigns, is(anInstanceOf(GetOperationResponse::class)));
        assertThat(
            $campaigns->getResult()->getCampaigns(),
            both(arrayWithSize(greaterThan(0)))
              ->andAlso(everyItem(anInstanceOf(CampaignGetItem::class)))
        );

        return array_map(
            function (CampaignGetItem $campaignGetItem) {
                return $campaignGetItem->getId();
            },
            $campaigns->getResult()->getCampaigns()
        );
    }
    /**
     * @test
     *
     * Чтобы тест работал, в аккаунте должны быть тестовые данные.
     * Их можно автоматом сгенерить в управлении песочницей в Директе.
     *
     * @return int[] Массив ID существующих кампаний
     */
    public function canGetPotentiallyActiveCampaigns()
    {
        $directDriver = $this->createDriver();

        /** @var CampaignGetItem[] $campaigns */
        $campaigns = $directDriver->getPotentiallyActiveCampaigns()->wait();

        assertThat(
            $campaigns,
            both(arrayWithSize(greaterThan(0)))
              ->andAlso(everyItem(anInstanceOf(CampaignGetItem::class)))
        );

        return array_map(
            function (CampaignGetItem $campaignGetItem) {
                return $campaignGetItem->getId();
            },
            $campaigns
        );
    }

    /**
     * @test
     * @depends canGetPotentiallyActiveCampaigns
     */
    public function canGetCampaign(array $existingCampaigns)
    {
        shuffle($existingCampaigns);
        $campaignId = $existingCampaigns[0];

        $directDriver = $this->createDriver();

        /** @var CampaignGetItem $campaign */
        $campaign = $directDriver->getCampaign($campaignId)->wait();

        assertThat($campaign->getId(), is(equalTo($campaignId)));
    }

    /**
     * @test
     */
    public function invalidToken_ThrowsException()
    {
        $directDriver = $this->createDriver('invalid token');

        /** @var GetOperationResponse $campaigns */
        $this->setExpectedException(ErrorException::class);
        $directDriver->getCampaigns()->wait();
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

        $factory = new SimpleDirectDriverFactory($serializer, $client, $tokenResolver, LowLevelDriver::URL_SANDBOX);

        return $factory->driverForClient(self::LOGIN);
    }

}
