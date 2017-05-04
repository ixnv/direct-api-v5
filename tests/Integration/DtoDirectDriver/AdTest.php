<?php

namespace eLama\DirectApiV5\Test\Integration\DtoDirectDriver;

use eLama\DirectApiV5\Dto\Ad\ModerateResponseBody;
use eLama\DirectApiV5\Dto\General\AddResponseBody;
use eLama\DirectApiV5\Dto\General\Enum\YesNoEnum;
use eLama\DirectApiV5\Dto\General\SuspendRequest;
use eLama\DirectApiV5\Dto\General\SuspendResponseBody;
use eLama\DirectApiV5\Dto\General\UpdateResponseBody;
use eLama\DirectApiV5\Dto\General\DeleteRequest;
use eLama\DirectApiV5\Dto\General\DeleteResponseBody;
use eLama\DirectApiV5\Dto\General\IdsCriteria;
use eLama\DirectApiV5\Dto\Keyword\KeywordAddItem;
use eLama\DirectApiV5\Dto\Keyword;
use eLama\DirectApiV5\Dto\Sitelink\AddRequest;
use eLama\DirectApiV5\Dto\Sitelink\Sitelink;
use eLama\DirectApiV5\Dto\Sitelink\SitelinksSetAddItem;
use eLama\DirectApiV5\DtoDirectDriver;
use eLama\DirectApiV5\RequestBody\AddAdRequestBody;
use eLama\DirectApiV5\RequestBody\AddKeywordRequestBody;
use eLama\DirectApiV5\RequestBody\AddSitelinkRequestBody;
use eLama\DirectApiV5\RequestBody\ModerateAdsRequestBody;
use eLama\DirectApiV5\RequestBody\SuspendAdsRequestBody;
use eLama\DirectApiV5\RequestBody\UpdateAdRequestBody;
use eLama\DirectApiV5\RequestBody\DeleteAdRequestBody;
use eLama\DirectApiV5\RequestBody\GetAdsRequestBody;
use eLama\DirectApiV5\Dto\General\ActionResult;
use eLama\DirectApiV5\Dto\Ad;
use eLama\DirectApiV5\Dto\Ad\AdUpdateItem;

class AdTest extends AdGroupExistenceDependantTestCase
{
    const TITLE = 'некий заголовок';
    const TEXT = 'Некоторый текст';
    const HREF = 'http://example.com';
    const ADS_QUANTITY = 4;
    const AD_LIMIT = 2;
    const DISPLAY_URL_PATH = 'чудо-сайт';

    /**
     * @var DtoDirectDriver
     */
    protected $driver;

    protected static $campaignIdForPagination = null;

    protected static $adGroupIdForPagination = null;

    protected function setUp()
    {
        $this->driver = self::createDtoDirectDriver();
    }

    /**
     * @test
     */
    public function addAd()
    {
        $sitelinkSetId = $this->createSitelinksSet();
        $adAddItem = new Ad\AdAddItem(self::$adGroupId);
        $textAd = new Ad\TextAdAdd(self::TEXT, self::TITLE, YesNoEnum::NO);
        $textAd->setSitelinkSetId($sitelinkSetId);

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
        assertThat($ad->isTextAd(), is(equalTo(true)));
        assertThat($ad->getTextAd()->getTitle(), is(equalTo(self::TITLE)));
        assertThat($ad->getTextAd()->getText(), is(equalTo(self::TEXT)));
        assertThat($ad->getTextAd()->getHref(), is(equalTo(self::HREF)));
        assertThat($ad->getTextAd()->getSitelinkSetId(), is(integerValue()));
        assertThat($ad->getTextAd()->getDisplayUrlPath(), is(equalTo(self::DISPLAY_URL_PATH)));
        assertThat($ad->getStatus(), is(equalTo("DRAFT")));

        return $adId;
    }

    /**
     * @test
     * @depends getAd
     */
    public function updateAd($id)
    {
        $ad = new AdUpdateItem($id);
        $textAd = new Ad\TextAdUpdate;
        $textAd->setHref('http://yandex.ru');
        $ad->setTextAd($textAd);

        $request = new UpdateAdRequestBody(
            new Ad\UpdateRequest([$ad])
        );

        /** @var UpdateResponseBody $responseBody */
        $responseBody = $this->driver->call($request)->wait()->getUnserializedBody();
        $updateId = $responseBody->getResult()->getUpdateResults()[0]->getId();

        assertThat($id, is(equalTo($updateId)));

        return $id;
    }

    /**
     * @test
     * @depends updateAd
     */
    public function moderateAd($id)
    {
        $this->createDefaultKeyword(); //иначе не модерируется

        $requestBody = new ModerateAdsRequestBody(new IdsCriteria([$id]));

        /** @var ModerateResponseBody $responseBody */
        $responseBody = $this->driver->call($requestBody)->wait()->getUnserializedBody();

        $moderateId = $responseBody->getResult()->getModerateResults()[0]->getId();

        assertThat($moderateId, is(equalTo($id)));

        return $id;
    }

    /**
     * @test
     * @depends moderateAd
     */
    public function suspendAd($id)
    {
        $requestBody = new SuspendAdsRequestBody(
            new SuspendRequest(new IdsCriteria([$id]))
        );

        /** @var SuspendResponseBody $suspendResponseBody */
        $suspendResponseBody = $this->driver->call($requestBody)->wait()->getUnserializedBody();

        $actionResults = $suspendResponseBody->getResult()->getSuspendResults();

        $this->assertEquals($id, $actionResults[0]->getId());

        return $id;
    }

    /**
     * @test
     * @depends suspendAd
     */
    public function deleteAd($id)
    {
        $request = new DeleteAdRequestBody(
            new DeleteRequest(new IdsCriteria([$id]))
        );

        /** @var DeleteResponseBody $responseBody */
        $responseBody = $this->driver->call($request)->wait()->getUnserializedBody();
        $deletedId = $responseBody->getResult()->getDeleteResults()[0]->getId();

        assertThat($id, is(equalTo($deletedId)));

        return $id;
    }

    /**
     * @return int
     */
    private function createSitelinksSet()
    {
        $sitelinkSetAddItem = new SitelinksSetAddItem([
            (new Sitelink('первая ссылка', 'http://ya.ru/1'))->setDescription('description 1'),
            (new Sitelink('вторая ссылка', 'http://ya.ru/2'))->setDescription('description 2'),
        ]);

        $requestBody = new AddSitelinkRequestBody(new AddRequest([$sitelinkSetAddItem]));

        /** @var AddResponseBody $responseBody */
        $responseBody = $this->driver->call($requestBody)->wait()->getUnserializedBody();

        return $responseBody->getResult()->getAddResults()[0]->getId();
    }

    private function addAdditionalParamsToTextAdAdd(Ad\TextAdAdd $textAd)
    {
        $textAd->setHref(self::HREF);
        $textAd->setDisplayUrlPath(self::DISPLAY_URL_PATH);
//        $textAd->setVCardId();todo  сделать добавление визитки, а потом тестить и это
//        $textAd->setAdImageHash('');todo пока не понятно, что с этим делать
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
     * @return Ad\AdGetItem
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
                YesNoEnum::NO
            );

            $ad->setHref(self::HREF . $i);
            $adAddItem->setTextAd($ad);
            $adAddItems[] = $adAddItem;
        }

        return $adAddItems;
    }

    private function createCampaignForPagination()
    {
        $driver = self::createDtoDirectDriver();
        $responseBody = self::createCampaign($driver);

        self::$campaignIdForPagination = $responseBody->getResult()->getAddResults()[0]->getId();
    }

    private function createAdGroupForPagination($campaignId)
    {
        self::$adGroupIdForPagination = static::createAdGroupForCampaign($campaignId);
    }

    private function createDefaultKeyword()
    {
        $keywordAddItem = new KeywordAddItem('moo', self::$adGroupId);

        $requestBody = new AddKeywordRequestBody(new Keyword\AddRequest([$keywordAddItem]));

        /** @var AddResponseBody $responseBody */
        $responseBody = $this->driver->call($requestBody)->wait()->getUnserializedBody();

        $id = $responseBody->getResult()->getAddResults()[0]->getId();

        return $id;
    }
}
