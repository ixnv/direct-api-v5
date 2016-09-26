<?php

namespace eLama\DirectApiV5\Test\Integration\DtoDirectDriver;

use eLama\DirectApiV5\Dto\Bids\BidActionResult;
use eLama\DirectApiV5\Dto\Bids\BidSetItem;
use eLama\DirectApiV5\Dto\Bids\BidsSelectionCriteria;
use eLama\DirectApiV5\Dto\Bids\Enum\PriorityEnum;
use eLama\DirectApiV5\Dto\Bids\GetResponseBody;
use eLama\DirectApiV5\Dto\Bids\SetRequest;
use eLama\DirectApiV5\Dto\General\AddResponseBody;
use eLama\DirectApiV5\Dto\General\IdsCriteria;
use eLama\DirectApiV5\Dto\General\SetResponseBody;
use eLama\DirectApiV5\Dto\General\SuspendRequest;
use eLama\DirectApiV5\Dto\General\SuspendResponseBody;
use eLama\DirectApiV5\Dto\Keyword\AddRequest;
use eLama\DirectApiV5\Dto\Keyword\KeywordAddItem;
use eLama\DirectApiV5\DtoDirectDriver;
use eLama\DirectApiV5\RequestBody\AddKeywordRequestBody;
use eLama\DirectApiV5\RequestBody\GetBidsRequestBody;
use eLama\DirectApiV5\RequestBody\SetBidsRequestBody;
use eLama\DirectApiV5\RequestBody\SuspendKeywordsRequestBody;

class BidsTest extends AdGroupExistenceDependantTestCase
{
    const BID_VALUE = 400000;
    const CONTEXT_BID_VALUE = 500000;

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
        $keywordId = $this->addCertainKeyword('тестовая фраза');

        $requestBody = new SetBidsRequestBody(
            new SetRequest([
                (new BidSetItem())
                    ->setKeywordId($keywordId)
                    ->setBid(self::BID_VALUE)
                    ->setContextBid(self::CONTEXT_BID_VALUE)
                    ->setStrategyPriority(PriorityEnum::HIGH)
            ])
        );

        /** @var SetResponseBody $responseBody */
        $responseBody = $this->driver->call($requestBody)->wait()->getUnserializedBody();

        /** @var BidActionResult $result */
        $result = $responseBody->getResult()->getSetResults()[0];

        assertThat($result->getKeywordId(), is(typeOf('integer')));

        return $result->getKeywordId();
    }

    /**
     * @test
     * @depends setBids
     * @param int $keywordId
     */
    public function getBids($keywordId)
    {
        $request = new GetBidsRequestBody(
            (new BidsSelectionCriteria())->setKeywordIds([$keywordId])
        );

        /** @var GetResponseBody $responseBody */
        $responseBody = $this->driver->call($request)->wait()->getUnserializedBody();
        $bids = $responseBody->getResult()->getBids()[0];

        $this->assertEquals(self::BID_VALUE, $bids->getBid());
        $this->assertEquals(self::CONTEXT_BID_VALUE, $bids->getContextBid());
    }

    /**
     * @param string $keyword
     * @return int
     */
    private function addCertainKeyword($keyword)
    {
        $keywordAddItem = new KeywordAddItem($keyword, self::$adGroupId);

        $requestBody = new AddKeywordRequestBody(new AddRequest([$keywordAddItem]));

        /** @var AddResponseBody $responseBody */
        $responseBody = $this->driver->call($requestBody)->wait()->getUnserializedBody();

        return $responseBody->getResult()->getAddResults()[0]->getId();
    }

    /**
     * @param int $id
     * @return \eLama\DirectApiV5\Dto\General\ActionResult[]
     */
    private function suspendCertainKeyword($id)
    {
        $suspendRequest = new SuspendRequest(
            (new IdsCriteria())->setIds([$id])
        );

        $suspendRequestBody = new SuspendKeywordsRequestBody($suspendRequest);

        /** @var SuspendResponseBody $suspendResponseBody */
        $suspendResponseBody = $this->driver->call($suspendRequestBody)->wait()->getUnserializedBody();

        return $suspendResponseBody->getResult()->getSuspendResults();
    }
}
