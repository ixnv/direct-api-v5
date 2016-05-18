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
