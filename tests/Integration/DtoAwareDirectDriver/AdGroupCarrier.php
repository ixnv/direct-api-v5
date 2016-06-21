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

trait AdGroupCarrier
{
    protected static $adGroupId;

    protected static function createAdGroup()
    {
        $adGroupAddItem = new AdGroupAddItem('Foo', static::$campaignId, [1]);

        $request = new AddAdGroupRequestBody(
            new AddRequest([$adGroupAddItem])
        );

        /** @var AddResponseBody $responseBody */
        $responseBody = static::createDtoAwareDirectDriver()->call($request)->wait()->getUnserializedBody();

        static::$adGroupId = $responseBody->getResult()->getAddResults()[0]->getId();
    }

    protected static function removeAdGroup()
    {
        $request = new DeleteAdGroupRequestBody(
            new DeleteRequest(new IdsCriteria([static::$adGroupId]))
        );

        /** @var DeleteResponseBody $responseBody */
        static::createDtoAwareDirectDriver()->call($request);
    }
}
