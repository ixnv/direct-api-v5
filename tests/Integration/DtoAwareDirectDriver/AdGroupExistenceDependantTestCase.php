<?php

namespace eLama\DirectApiV5\Test\Integration\DtoAwareDirectDriver;

use eLama\DirectApiV5\Dto\AdGroup\AddRequest;
use eLama\DirectApiV5\Dto\AdGroup\AdGroupAddItem;
use eLama\DirectApiV5\Dto\AdGroup\DeleteRequest;
use eLama\DirectApiV5\Dto\General\AddResponseBody;
use eLama\DirectApiV5\Dto\General\DeleteResponseBody;
use eLama\DirectApiV5\Dto\General\IdsCriteria;
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
        $responseBody = static::createDtoAwareDirectDriver()->call($request)->wait()->getUnserializedBody();

        return $responseBody->getResult()->getAddResults()[0]->getId();
    }

    protected static function removeAdGroup()
    {
        $request = new DeleteAdGroupRequestBody(
            new DeleteRequest(new IdsCriteria([static::$adGroupId]))
        );

        /** @var DeleteResponseBody $responseBody */
        static::createDtoAwareDirectDriver()->call($request)->wait();
    }

    public static function setUpBeforeClass()
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