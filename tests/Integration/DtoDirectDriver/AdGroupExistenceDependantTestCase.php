<?php

namespace eLama\DirectApiV5\Test\Integration\DtoDirectDriver;

use eLama\DirectApiV5\Dto\AdGroup\AddRequest;
use eLama\DirectApiV5\Dto\AdGroup\AdGroupAddItem;
use eLama\DirectApiV5\Dto\General\AddResponseBody;
use eLama\DirectApiV5\Dto\General\DeleteRequest;
use eLama\DirectApiV5\Dto\General\DeleteResponseBody;
use eLama\DirectApiV5\Dto\General\IdsCriteria;
use eLama\DirectApiV5\DtoDirectDriver;
use eLama\DirectApiV5\RequestBody\AddAdGroupRequestBody;
use eLama\DirectApiV5\RequestBody\DeleteAdGroupRequestBody;

class AdGroupExistenceDependantTestCase extends DirectCampaignExistenceDependantTestCase
{
    /**
     * @var int
     */
    protected static $adGroupId;

    protected static function createAdGroup()
    {
        static::$adGroupId = static::createAdGroupForCampaign(static::$campaignId);
    }

    protected static function createAdGroupForCampaign($campaignId)
    {
        $adGroupAddItem = new AdGroupAddItem('Foo', $campaignId, [1]);

        $request = new AddAdGroupRequestBody(
            new AddRequest([$adGroupAddItem])
        );

        /** @var AddResponseBody $responseBody */
        $responseBody = static::createDtoDirectDriver()->call($request)->wait()->getUnserializedBody();

        return $responseBody->getResult()->getAddResults()[0]->getId();
    }

    protected static function removeAdGroup()
    {
        $request = new DeleteAdGroupRequestBody(
            new DeleteRequest(new IdsCriteria([static::$adGroupId]))
        );

        /** @var DeleteResponseBody $responseBody */
        static::createDtoDirectDriver()->call($request)->wait();
    }

    public static function setUpBeforeClass(DtoDirectDriver $dtoDirectDriver = null)
    {
        parent::setUpBeforeClass();

        self::createAdGroup();
    }

    public static function tearDownAfterClass()
    {
        self::removeAdGroup();

        parent::tearDownAfterClass();
    }
}
