<?php

namespace eLama\DirectApiV5\Test\Integration\DtoDirectDriver;

use eLama\DirectApiV5\Dto\Campaign\AddRequest as CampaignAddRequest;
use eLama\DirectApiV5\Dto\Campaign\CampaignAddItem;
use eLama\DirectApiV5\Dto\Campaign\TextCampaignAddItem;
use eLama\DirectApiV5\Dto\Campaign\TextCampaignNetworkStrategyAdd;
use eLama\DirectApiV5\Dto\Campaign\Enum\TextCampaignNetworkStrategyTypeEnum;
use eLama\DirectApiV5\Dto\Campaign\TextCampaignSearchStrategyAdd;
use eLama\DirectApiV5\Dto\Campaign\Enum\TextCampaignSearchStrategyTypeEnum;
use eLama\DirectApiV5\Dto\Campaign\TextCampaignStrategyAdd;
use eLama\DirectApiV5\Dto\General\AddResponseBody;
use eLama\DirectApiV5\Dto\General\DeleteRequest;
use eLama\DirectApiV5\Dto\General\IdsCriteria;
use eLama\DirectApiV5\DtoDirectDriver;
use eLama\DirectApiV5\RequestBody\AddCampaignRequestBody;
use eLama\DirectApiV5\RequestBody\DeleteCampaignRequestBody;
use eLama\DirectApiV5\Test\Integration\DirectApiV5TestCase;


abstract class DirectCampaignExistenceDependantTestCase extends DirectApiV5TestCase
{
    const AD_GROUP_NAME = 'Moo';

    /** @var int */
    protected static $campaignId;

    public static function setUpBeforeClass(DtoDirectDriver $dtoDirectDriver = null)
    {
        $driver = self::createDtoDirectDriver();

        parent::setUpBeforeClass($driver);

        self::$campaignId = self::createCampaign($driver)->getResult()->getAddResults()[0]->getId();
    }

    public static function tearDownAfterClass()
    {
        if (!empty(static::$campaignId)) {
            $driver = self::createDtoDirectDriver();

            self::deleteCampaign($driver, static::$campaignId);
        }
    }

    /**
     * @param $driver
     * @return AddResponseBody
     */
    protected static function createCampaign(DtoDirectDriver $driver)
    {
        $campaignAddItem = new CampaignAddItem(
            'AdTest',
            (new \DateTime('now', new \DateTimeZone('Europe/Moscow')))->format('Y-m-d')
        );
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

    /**
     * @param DtoDirectDriver $driver
     * @param int $campaignId
     */
    protected static function deleteCampaign(DtoDirectDriver $driver, $campaignId)
    {
        $request = new DeleteCampaignRequestBody(new DeleteRequest(
            new IdsCriteria([$campaignId])
        ));

        $driver->call($request)->wait();
    }
}
