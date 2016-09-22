<?php

namespace eLama\DirectApiV5\Test\Integration\DtoDirectDriver;

use eLama\DirectApiV5\Dto\Bids\BidSetItem;
use eLama\DirectApiV5\Dto\Bids\SetRequest;
use eLama\DirectApiV5\Dto\General\AddResponseBody;
use eLama\DirectApiV5\DtoDirectDriver;
use eLama\DirectApiV5\RequestBody\SetBidsRequestBody;

class BidsTest extends AdGroupExistenceDependantTestCase
{
    /**
     * @var DtoDirectDriver
     */
    protected $driver;

    protected function setUp()
    {
        $this->driver = self::createDtoDirectDriver();
    }

    /**
     * @test
     */
    public function setBids()
    {
        $requestBody = new SetBidsRequestBody(
            new SetRequest(
                [(new BidSetItem())->setAdGroupId(self::$adGroupId)->setBid(1)->setContextBid(2)]
            )
        );

        /** @var AddResponseBody $responseBody */
        $responseBody = $this->driver->call($requestBody)->wait()->getUnserializedBody();

        $result = $responseBody->getResult();
    }
}
