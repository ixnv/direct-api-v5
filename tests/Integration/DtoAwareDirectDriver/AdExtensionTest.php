<?php

namespace eLama\DirectApiV5\Test\Integration\DtoAwareDirectDriver;

use eLama\DirectApiV5\Dto\AdExtensions\AddRequest as AddAdExtensionRequest;
use eLama\DirectApiV5\Dto\AdExtensions\AdExtension;
use eLama\DirectApiV5\Dto\AdExtensions\AdExtensionAddItem;
use eLama\DirectApiV5\Dto\AdExtensions\Callout;
use eLama\DirectApiV5\Dto\General\AddResponseBody;
use eLama\DirectApiV5\Dto\General\UpdateResponseBody;
use eLama\DirectApiV5\Dto\General\DeleteRequest;
use eLama\DirectApiV5\Dto\General\DeleteResponseBody;
use eLama\DirectApiV5\Dto\General\IdsCriteria;
use eLama\DirectApiV5\Dto\Sitelink\AddRequest;
use eLama\DirectApiV5\Dto\Sitelink\Sitelink;
use eLama\DirectApiV5\Dto\Sitelink\SitelinksSetAddItem;
use eLama\DirectApiV5\DtoAwareDirectDriver;
use eLama\DirectApiV5\RequestBody\AddAdExtensionRequestBody;
use eLama\DirectApiV5\RequestBody\AddAdRequestBody;
use eLama\DirectApiV5\RequestBody\AddSitelinkRequestBody;
use eLama\DirectApiV5\RequestBody\UpdateAdRequestBody;
use eLama\DirectApiV5\RequestBody\DeleteAdRequestBody;
use eLama\DirectApiV5\RequestBody\GetAdsRequestBody;
use eLama\DirectApiV5\Dto\General\ActionResult;
use eLama\DirectApiV5\Dto\Ad;
use eLama\DirectApiV5\Dto\Ad\AdUpdateItem;

class AdExtensionTest extends AdGroupExistenceDependantTestCase
{
    const TITLE = 'некий заголовок';
    const TEXT = 'Некоторый текст';
    const HREF = 'http://example.com';
    const ADS_QUANTITY = 4;
    const AD_LIMIT = 2;
    const DISPLAY_URL_PATH = 'чудо-сайт';

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
    public function addAdWithAdExtensions()
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
     * @depends addAdWithAdExtensions
     */
    public function getAdWithAdExtensions($adId)
    {
        $ad = $this->getAdInCampaignWithId(self::$campaignId, $adId);
        assertThat($ad->getTextAd()->getTitle(), is(equalTo(self::TITLE)));
        assertThat($ad->getTextAd()->getText(), is(equalTo(self::TEXT)));
        assertThat($ad->getTextAd()->getHref(), is(equalTo(self::HREF)));
        assertThat($ad->getTextAd()->getSitelinkSetId(), is(integerValue()));
        assertThat($ad->getTextAd()->getDisplayUrlPath(), is(equalTo(self::DISPLAY_URL_PATH)));

        return $adId;
    }

    /**
     * @test
     * @depends getAd
     */
    public function updateAdd($id)
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
     * @depends updateAdd
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
     * @param Ad\TextAdAdd $textAd
     */
    private function addAdditionalParamsToTextAdAdd(Ad\TextAdAdd $textAd)
    {
        $textAd->setHref(self::HREF);
        $textAd->setDisplayUrlPath(self::DISPLAY_URL_PATH);
//        $textAd->setVCardId();todo  сделать добавление визитки, а потом тестить и это
//        $textAd->setAdImageHash('');todo пока не понятно, что с этим делать
        $textAd->setAdExtensionIds($this->createAdExtensions());
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
     * @return int[]
     */
    private function createAdExtensions()
    {
        $requestBody = new AddAdExtensionRequestBody(
            new AddAdExtensionRequest(
                [
                    new AdExtensionAddItem(new Callout('Крутое уточнение'))
                ]
            )
        );

        /** @var AddResponseBody $responseBody */
        $responseBody = $this->driver->call($requestBody)->wait()->getUnserializedBody();

        return array_map(function (ActionResult $result) {
            return $result->getId();
        }, $responseBody->getResult()->getAddResults());
    }
}
