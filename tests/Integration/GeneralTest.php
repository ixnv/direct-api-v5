<?php

namespace eLama\DirectApiV5\Test\Integration;

use eLama\DirectApiV5\DirectDriver;
use eLama\DirectApiV5\Dto\Campaign\CampaignGetItem;
use eLama\DirectApiV5\Dto\Campaign\GetOperationResponse;
use eLama\DirectApiV5\ErrorException;
use eLama\DirectApiV5\JmsFactory;
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
        $directDriver = $this->createDriver(self::TOKEN);

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
     * @depends canGetCampaigns
     */
    public function canGetCampaign(array $existingCampaigns)
    {
        shuffle($existingCampaigns);
        $campaignId = $existingCampaigns[0];

        $directDriver = $this->createDriver(self::TOKEN);

        /** @var CampaignGetItem $campaign */
        $campaign = $directDriver->getCampaign($campaignId)->wait();

        assertThat($campaign, is(anInstanceOf(CampaignGetItem::class)));
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
     * @return DirectDriver
     */
    private function createDriver($token = self::TOKEN)
    {
        $serializer = JmsFactory::create()->serializer();
        $client = new Client();

        return new DirectDriver($serializer, $client, $token, self::LOGIN);
    }

}
