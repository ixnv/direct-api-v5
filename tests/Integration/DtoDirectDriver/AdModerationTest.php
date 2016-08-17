<?php

namespace eLama\DirectApiV5\Test\Integration\DtoDirectDriver;

use eLama\DirectApiV5\Dto\Ad;
use eLama\DirectApiV5\Dto\Ad\AdAddItem;
use eLama\DirectApiV5\Dto\Ad\ModerateResponseBody;
use eLama\DirectApiV5\Dto\Ad\TextAdAdd;
use eLama\DirectApiV5\Dto\General\AddResponseBody;
use eLama\DirectApiV5\Dto\General\DeleteRequest;
use eLama\DirectApiV5\Dto\General\DeleteResponseBody;
use eLama\DirectApiV5\Dto\General\IdsCriteria;
use eLama\DirectApiV5\Dto\Keyword\AddRequest;
use eLama\DirectApiV5\Dto\Keyword\KeywordAddItem;
use eLama\DirectApiV5\DtoDirectDriver;
use eLama\DirectApiV5\RequestBody\AddAdRequestBody;
use eLama\DirectApiV5\RequestBody\AddKeywordRequestBody;
use eLama\DirectApiV5\RequestBody\DeleteAdRequestBody;
use eLama\DirectApiV5\RequestBody\DeleteKeywordRequestBody;
use eLama\DirectApiV5\RequestBody\GetAdsRequestBody;
use eLama\DirectApiV5\RequestBody\ModerateAdsRequestBody;

class AdModerationTest extends AdGroupExistenceDependantTestCase
{
    private static $keywordId;

    private static $adId;
    
    /** @var  DtoDirectDriver */
    protected $driver;

    public static function setUpBeforeClass(DtoDirectDriver $dtoDirectDriver = null)
    {
        parent::setUpBeforeClass($dtoDirectDriver);

        self::createKeyword();
        self::createDefaultAd();
    }

    public static function tearDownAfterClass()
    {
        self::removeKeyword();
        self::removeAd();

        parent::tearDownAfterClass();
    }

    protected function setUp()
    {
        $this->driver = self::createDtoDirectDriver();
    }
    
    /**
     * @test
     */
    public function checkAdStatusIsDraft()
    {
        $ad = $this->getAdById(self::$adId);
        assertThat($ad->getStatus(), is(equalTo("DRAFT")));
    }

    /**
     * @test
     * @depends checkAdStatusIsDraft
     */
    public function moderateAd()
    {
        $requestBody = new ModerateAdsRequestBody(
            new IdsCriteria([self::$adId])
        );

        /** @var ModerateResponseBody $responseBody */
        $responseBody = $this->driver->call($requestBody)->wait()->getUnserializedBody();

        $moderateId = $responseBody->getResult()->getModerateResults()[0]->getId();
        assertThat($moderateId, is(equalTo(self::$adId)));
    }

    /**
     * @test
     * @depends moderateAd
     */
    public function checkAdStatusIsModeration()
    {
        $ad = $this->getAdById(self::$adId);
        assertThat($ad->getStatus(), is(equalTo("MODERATION")));
    }

    private static function createKeyword()
    {
        $driver = static::createDtoDirectDriver();

        $keywordAddItem = new KeywordAddItem('moo', static::$adGroupId);

        $requestBody = new AddKeywordRequestBody(new AddRequest([$keywordAddItem]));

        /** @var AddResponseBody $responseBody */
        $responseBody = $driver->call($requestBody)->wait()->getUnserializedBody();

        self::$keywordId = $responseBody->getResult()->getAddResults()[0]->getId();
    }

    private static function removeKeyword()
    {
        $driver = static::createDtoDirectDriver();

        $request = new DeleteKeywordRequestBody(
            new DeleteRequest(new IdsCriteria([self::$keywordId]))
        );

        /** @var DeleteResponseBody $responseBody */
        $driver->call($request)->wait()->getUnserializedBody();
    }

    private static function createDefaultAd()
    {
        $driver = static::createDtoDirectDriver();

        $adAddItem = new AdAddItem(static::$adGroupId);
        $textAd = new TextAdAdd('some text', 'some title', Ad\YesNoEnum::NO);
        $textAd->setHref('http://example.com');

        $adAddItem->setTextAd($textAd);

        $requestBody = new AddAdRequestBody(new Ad\AddRequest([$adAddItem]));

        /** @var AddResponseBody $responseBody */
        $responseBody = $driver->call($requestBody)->wait()->getUnserializedBody();

        self::$adId = $responseBody->getResult()->getAddResults()[0]->getId();
    }

    private static function removeAd()
    {
        $driver = static::createDtoDirectDriver();

        $request = new DeleteAdRequestBody(
            new DeleteRequest(new IdsCriteria([self::$adId]))
        );

        /** @var DeleteResponseBody $responseBody */
        $driver->call($request)->wait()->getUnserializedBody();
    }
    
    /**
     * @param int $adId
     * @return Ad\AdGetItem
     */
    private function getAdById($adId)
    {
        $requestBody = new GetAdsRequestBody(
            (new Ad\AdsSelectionCriteria())->setIds([$adId])
        );

        /** @var Ad\GetResponseBody $responseBody */
        $responseBody = $this->driver->call($requestBody)->wait()->getUnserializedBody();

        $adGetItems = $responseBody->getResult()->getAds();

        return array_pop($adGetItems);

    }
}
