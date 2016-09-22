<?php

namespace eLama\DirectApiV5\Test\Integration\DtoDirectDriver;

use eLama\DirectApiV5\Dto\Bids\BidSetItem;
use eLama\DirectApiV5\Dto\Bids\SetRequest;
use eLama\DirectApiV5\Dto\General\AddResponseBody;
use eLama\DirectApiV5\Dto\Keyword\AddRequest;
use eLama\DirectApiV5\Dto\Keyword\KeywordAddItem;
use eLama\DirectApiV5\DtoDirectDriver;
use eLama\DirectApiV5\RequestBody\AddKeywordRequestBody;
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
        $keywordAddItem = new KeywordAddItem('тестовая фраза', self::$adGroupId);

        $requestBody = new AddKeywordRequestBody(new AddRequest([$keywordAddItem]));

        /** @var AddResponseBody $responseBody */
        $responseBody = $this->driver->call($requestBody)->wait()->getUnserializedBody();

        $keywordId = $responseBody->getResult()->getAddResults()[0]->getId();


        $bidRequestBody = new SetBidsRequestBody(
            new SetRequest(
                [(new BidSetItem())->setKeywordId($keywordId)->setBid(300000)->setContextBid(300000)]
            )
        );

        /** @var AddResponseBody $responseBody */
        $bidResponseBody = $this->driver->call($bidRequestBody)->wait()->getUnserializedBody();

        $result = $bidResponseBody->getResult();
    }
}
