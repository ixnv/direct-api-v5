<?php

namespace eLama\DirectApiV5\Test\Integration\DtoAwareDirectDriver;

use eLama\DirectApiV5\Dto\General\AddResponseBody;
use eLama\DirectApiV5\Dto\General\DeleteResponseBody;
use eLama\DirectApiV5\Dto\General\IdsCriteria;
use eLama\DirectApiV5\DtoAwareDirectDriver;
use eLama\DirectApiV5\RequestBody\AddAdRequestBody;
use eLama\DirectApiV5\RequestBody\DeleteAdRequestBody;
use eLama\DirectApiV5\RequestBody\GetAdsRequestBody;
use eLama\DirectApiV5\Dto\General\ActionResult;
use eLama\DirectApiV5\Dto\Ad;

class AdTest extends AdGroupExistenceDependantTestCase
{
    const TITLE = 'некий заголовок';
    const TEXT = 'Некоторый текст';
    const HREF = 'http://example.com';
    const ADS_QUANTITY = 4;
    const AD_LIMIT = 2;

    /**
     * @var DtoAwareDirectDriver
     */
    protected $driver;

    protected static $campaignIdForPagination = null;

    protected static $adGroupIdForPagination = null;

    protected function setUp()
    {
        $this->driver = self::createDtoAwareDirectDriver();
    }

    /**
     * @test
     */
    public function addAd()
    {
        $adAddItem = new Ad\AdAddItem(self::$adGroupId);
        $textAd = new Ad\TextAdAdd(self::TEXT, self::TITLE, Ad\YesNoEnum::NO);

        $this->addAdditionalParamsToTextAdAdd($textAd);

        $adAddItem->setTextAd($textAd);

        $requestBody = new AddAdRequestBody(new Ad\AddRequest([$adAddItem]));

        /** @var AddResponseBody $responseBody */
        $responseBody = $this->driver->call($requestBody)->wait()->getUnserializedBody();

        $id = $responseBody->getResult()->getAddResults()[0]->getId();
        assertThat($id, is(typeOf('integer')));

        return $id;
    }

    /**
     * @test
     * @depends addAd
     */
    public function getAd($adId)
    {
        $ad = $this->getAdInCampaignWithId(self::$campaignId, $adId);
        assertThat($ad->getTextAd()->getTitle(), is(equalTo(self::TITLE)));
        assertThat($ad->getTextAd()->getText(), is(equalTo(self::TEXT)));
        assertThat($ad->getTextAd()->getHref(), is(equalTo(self::HREF)));

        return $adId;
    }

    /**
     * @test
     * @depends getAd
     */
    public function deleteAd($id)
    {
        $request = new DeleteAdRequestBody(
            new Ad\DeleteRequest(new IdsCriteria([$id]))
        );

        /** @var DeleteResponseBody $responseBody */
        $responseBody = $this->driver->call($request)->wait()->getUnserializedBody();
        $deletedId = $responseBody->getResult()->getDeleteResults()[0]->getId();

        assertThat($id, is(equalTo($deletedId)));

        return $id;
    }

    private function addAdditionalParamsToTextAdAdd(Ad\TextAdAdd $textAd)
    {
        $textAd->setHref(self::HREF);
        $textAd->setDisplayUrlPath('чудо-сайт');
//        $textAd->setVCardId();todo  сделать добавление визитки, а потом тестить и это
//        $textAd->setAdImageHash('');todo пока не понятно, что с этим делать
//        $textAd->setSitelinkSetId(1);todo сначала запилить Sitelinks
//        $textAd->setAdExtensionIds(['1', '2']);todo расширения надо сделать сначала
    }

    /**
     * @test
     * @depends deleteAd
     */
    public function getDeletedAd($id)
    {
        $ad = $this->getAdInCampaignWithId(self::$campaignId, $id);

        assertThat($ad, is(nullValue()));
    }

    /**
     * @test
     */
    public function addAdsByQuantity()
    {
        $this->createCampaignForPagination();

        $this->createAdGroupForPagination(self::$campaignIdForPagination);

        $adItems = $this->generateAdAddItems(self::ADS_QUANTITY, self::$adGroupIdForPagination);

        $requestBody = new AddAdRequestBody(new Ad\AddRequest($adItems));

        /** @var AddResponseBody $responseBody */
        $responseBody = $this->driver->call($requestBody)->wait()->getUnserializedBody();

        $result = $responseBody->getResult()->getAddResults();

        $adsIds = array_map(function (ActionResult $item) {
            return $item->getId();
        }, $result);

        $this->assertCount(self::ADS_QUANTITY, $adsIds);

        return $adsIds;
    }

    /**
     * @test
     * @depends addAdsByQuantity
     */
    public function getAdsByIdsWithPagination()
    {
        $adItems = $this->getAdInCampaignWithPagination([self::$campaignIdForPagination], self::AD_LIMIT, $offset = 0);
        $this->assertCount(self::AD_LIMIT, $adItems->getAds());
        $limitedBy = $adItems->getLimitedBy();
        $this->assertEquals(self::AD_LIMIT, $limitedBy);
        $adItems = $this->getAdInCampaignWithPagination([self::$campaignIdForPagination], self::AD_LIMIT, $limitedBy);
        $this->assertNull($adItems->getLimitedBy());
    }

    /**
     * @test
     */
    public function getAdsForCampaignId_GivenNoAds_ReturnsCorrectResponseWithoutAds()
    {
        $responseBody = self::createCampaign($this->driver);
        $campaignId = $responseBody->getResult()->getAddResults()[0]->getId();
        $requestBody = new GetAdsRequestBody(
            (new Ad\AdsSelectionCriteria())->setCampaignIds([$campaignId])
        );

        /** @var Ad\GetResponseBody $responseBody */
        $responseBody = $this->driver->call($requestBody)->wait()->getUnserializedBody();

        assertThat($responseBody->getResult()->getAds(), is(emptyArray()));
        self::deleteCampaign($this->driver, $campaignId);
    }

    /**
     * @param $campaignId
     * @param $adId
     * @return array|mixed
     */
    private function getAdInCampaignWithId($campaignId, $adId)
    {
        $requestBody = new GetAdsRequestBody(
            (new Ad\AdsSelectionCriteria())->setCampaignIds([$campaignId])
        );

        /** @var Ad\GetResponseBody $responseBody */
        $responseBody = $this->driver->call($requestBody)->wait()->getUnserializedBody();

        $adGetItems = $responseBody->getResult()->getAds();

        $targetAd = array_filter(
            $adGetItems,
            function (Ad\AdGetItem $ad) use ($adId) {
                return $ad->getId() == $adId;
            }
        );
        $targetAd = array_pop($targetAd);

        return $targetAd;
    }

    /**
     * @param array $campaignIds
     * @param int $limit
     * @param int $offset
     * @return \eLama\DirectApiV5\Dto\Ad\GetResult
     */
    private function getAdInCampaignWithPagination(array $campaignIds, $limit, $offset)
    {
        $requestBody = new GetAdsRequestBody(
            (new Ad\AdsSelectionCriteria())->setCampaignIds($campaignIds)
        );

        $requestBody->setLimit($limit);
        $requestBody->setOffset($offset);

        /** @var Ad\GetResponseBody $responseBody */
        $responseBody = $this->driver->call($requestBody)->wait()->getUnserializedBody();
        return $responseBody->getResult();
    }

    /**
     * @param $quantity
     * @param $adGroupId
     * @return array
     */
    private function generateAdAddItems($quantity, $adGroupId)
    {
        $adAddItems = [];
        for ($i = 1; $i <= $quantity; $i++) {
            $adAddItem = new Ad\AdAddItem($adGroupId);

            $ad = new Ad\TextAdAdd(
                self::TEXT . $i,
                self::TITLE . $i,
                Ad\YesNoEnum::NO
            );

            $ad->setHref(self::HREF . $i);
            $adAddItem->setTextAd($ad);
            $adAddItems[] = $adAddItem;
        }

        return $adAddItems;
    }

    private function createCampaignForPagination()
    {
        $driver = self::createDtoAwareDirectDriver();
        $responseBody = self::createCampaign($driver);

        self::$campaignIdForPagination = $responseBody->getResult()->getAddResults()[0]->getId();
    }

    private function createAdGroupForPagination($campaignId)
    {
        self::$adGroupIdForPagination = static::createAdGroupForCampaign($campaignId);
    }
}
