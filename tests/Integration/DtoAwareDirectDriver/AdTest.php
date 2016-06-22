<?php

namespace eLama\DirectApiV5\Test\Integration\DtoAwareDirectDriver;

use eLama\DirectApiV5\Dto\Ad\AdAddItem;
use eLama\DirectApiV5\Dto\Ad\AddRequest;
use eLama\DirectApiV5\Dto\Ad\AdGetItem;
use eLama\DirectApiV5\Dto\Ad\AdsSelectionCriteria;
use eLama\DirectApiV5\Dto\Ad\DeleteRequest;
use eLama\DirectApiV5\Dto\Ad\GetResponseBody;
use eLama\DirectApiV5\Dto\Ad\TextAdAdd;
use eLama\DirectApiV5\Dto\Ad\YesNoEnum;
use eLama\DirectApiV5\Dto\General\AddResponseBody;
use eLama\DirectApiV5\Dto\General\DeleteResponseBody;
use eLama\DirectApiV5\Dto\General\IdsCriteria;
use eLama\DirectApiV5\DtoAwareDirectDriver;
use eLama\DirectApiV5\RequestBody\AddAdRequestBody;
use eLama\DirectApiV5\RequestBody\DeleteAdRequestBody;
use eLama\DirectApiV5\RequestBody\GetAdsRequestBody;

class AdTest extends AdGroupExistenceDependantTestCase
{

    const TITLE = 'некий заголовок';
    const TEXT = 'Некоторый текст';
    const HREF = 'http://example.com';

    /**
     * @var DtoAwareDirectDriver
     */
    protected $driver;

    protected function setUp()
    {
        $this->driver = self::createDtoAwareDirectDriver();
    }

    /**
     * @test
     */
    public function addAd()
    {
        $adAddItem = new AdAddItem(self::$adGroupId);
        $textAd = new TextAdAdd(self::TEXT, self::TITLE, YesNoEnum::NO);
        $textAd->setHref(self::HREF);
        $adAddItem->setTextAd($textAd);

        $requestBody = new AddAdRequestBody(new AddRequest([$adAddItem]));

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
            new DeleteRequest(new IdsCriteria([$id]))
        );

        /** @var DeleteResponseBody $responseBody */
        $responseBody = $this->driver->call($request)->wait()->getUnserializedBody();
        $deletedId = $responseBody->getResult()->getDeleteResults()[0]->getId();

        assertThat($id, is(equalTo($deletedId)));

        return $id;
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
     * @return array|mixed
     */
    private function getAdInCampaignWithId($campaignId, $adId)
    {
        $requestBody = new GetAdsRequestBody(
            (new AdsSelectionCriteria())->setCampaignIds([$campaignId])
        );

        /** @var GetResponseBody $responseBody */
        $responseBody = $this->driver->call($requestBody)->wait()->getUnserializedBody();

        $adGetItems = $responseBody->getResult()->getAds();

        $targetAd = array_filter(
            $adGetItems,
            function (AdGetItem $ad) use ($adId) {
                return $ad->getId() == $adId;
            }
        );
        $targetAd = array_pop($targetAd);

        return $targetAd;
    }
}
