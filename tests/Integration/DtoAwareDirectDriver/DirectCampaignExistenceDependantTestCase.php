<?php

namespace eLama\DirectApiV5\Test\Integration\DtoAwareDirectDriver;

use eLama\DirectApiV5\Dto\Campaign\AddRequest as CampaignAddRequest;
use eLama\DirectApiV5\Dto\Campaign\CampaignAddItem;
use eLama\DirectApiV5\Dto\Campaign\DeleteRequest;
use eLama\DirectApiV5\Dto\Campaign\TextCampaignAddItem;
use eLama\DirectApiV5\Dto\Campaign\TextCampaignNetworkStrategyAdd;
use eLama\DirectApiV5\Dto\Campaign\TextCampaignNetworkStrategyTypeEnum;
use eLama\DirectApiV5\Dto\Campaign\TextCampaignSearchStrategyAdd;
use eLama\DirectApiV5\Dto\Campaign\TextCampaignSearchStrategyTypeEnum;
use eLama\DirectApiV5\Dto\Campaign\TextCampaignStrategyAdd;
use eLama\DirectApiV5\Dto\General\AddResponseBody;
use eLama\DirectApiV5\Dto\General\IdsCriteria;
use eLama\DirectApiV5\DtoAwareDirectDriver;
use eLama\DirectApiV5\JmsFactory;
use eLama\DirectApiV5\LowLevelDriver\LowLevelDriver;
use eLama\DirectApiV5\RequestBody\AddCampaignRequestBody;
use eLama\DirectApiV5\RequestBody\DeleteCampaignRequestBody;
use GuzzleHttp\Client;
use Monolog\Logger;

abstract class DirectCampaignExistenceDependantTestCase extends \PHPUnit_Framework_TestCase
{
    const LOGIN = 'ra-trinet-add-dev-01';
    const TOKEN = '3fe13d8bd818458c89624f678f365051';
    const AD_GROUP_NAME = 'Moo';

    /**
     * @var int
     */
    protected static $campaignId;

    public static function setUpBeforeClass()
    {
        $driver = self::createDtoAwareDirectDriver();

        $responseBody = self::createCampaign($driver);

        self::$campaignId = $responseBody->getResult()->getAddResults()[0]->getId();
    }

    public static function tearDownAfterClass()
    {
        if (!empty(static::$campaignId)) {
            $driver = self::createDtoAwareDirectDriver();

            $request = new DeleteCampaignRequestBody(new DeleteRequest(
                new IdsCriteria([static::$campaignId])
            ));

            $driver->call($request)->wait();
        }
    }

    protected static function createDtoAwareDirectDriver()
    {
        $serializer = JmsFactory::create()->serializer();
        $lo = LowLevelDriver::createAdapterForClient(new Client(), new Logger('Test'), LowLevelDriver::URL_SANDBOX);
        return new DtoAwareDirectDriver($serializer, $lo, self::TOKEN, self::LOGIN);
    }

    /**
     * @param $driver
     * @return AddResponseBody
     */
    private static function createCampaign(DtoAwareDirectDriver $driver)
    {
        $campaignAddItem = new CampaignAddItem('AdTest', (new \DateTime())->format('Y-m-d'));
        $campaignAddItem->setTextCampaign(
            new TextCampaignAddItem(
                new TextCampaignStrategyAdd(
                    new TextCampaignSearchStrategyAdd(TextCampaignSearchStrategyTypeEnum::HIGHEST_POSITION),
                    new TextCampaignNetworkStrategyAdd(TextCampaignNetworkStrategyTypeEnum::MAXIMUM_COVERAGE)
                )
            )
        );
        $request = new AddCampaignRequestBody(
            new CampaignAddRequest([
                $campaignAddItem,
            ])
        );
        /** @var AddResponseBody $responseBody */
        $responseBody = $driver->call($request)->wait()->getUnserializedBody();

        return $responseBody;
    }
}
