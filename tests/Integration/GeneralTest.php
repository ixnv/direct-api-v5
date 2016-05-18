<?php

namespace eLama\DirectApiV5\Test\Integration;

use eLama\DirectApiV5\DirectDriver;
use eLama\DirectApiV5\Dto\Campaign\CampaignGetItem;
use eLama\DirectApiV5\Dto\Campaign\GetOperationResponse;
use eLama\DirectApiV5\JmsFactory;
use GuzzleHttp\Client;
use PHPUnit_Framework_TestCase;

class GeneralTest extends PHPUnit_Framework_TestCase
{
    const LOGIN = 'ra-trinet-add-dev-01';
    const TOKEN = '3fe13d8bd818458c89624f678f365051';

    /**
     * @test
     */
    public function canGetCampaigns()
    {
        $serializer = JmsFactory::create()->serializer();
        $client = new Client();
        $directDriver = new DirectDriver($serializer, $client, self::TOKEN, self::LOGIN);

        /** @var GetOperationResponse $campaigns */
        $campaigns = $directDriver->getCampaigns()->wait();

        assertThat($campaigns, is(anInstanceOf(GetOperationResponse::class)));
        assertThat(
            $campaigns->getResult()->getCampaigns(),
            both(arrayWithSize(greaterThan(0)))
              ->andAlso(everyItem(anInstanceOf(CampaignGetItem::class)))
        );
    }

}
