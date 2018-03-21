<?php

namespace eLama\DirectApiV5\Test\Integration\DtoDirectDriver;

use eLama\DirectApiV5\Dto\AdExtensions\AddRequest as AddAdExtensionRequest;
use eLama\DirectApiV5\Dto\AdExtensions\AdExtensionAddItem;
use eLama\DirectApiV5\Dto\AdExtensions\AdExtensionsSelectionCriteria;
use eLama\DirectApiV5\Dto\AdExtensions\Callout;
use eLama\DirectApiV5\Dto\General\AddResponseBody;
use eLama\DirectApiV5\Dto\General\DeleteRequest;
use eLama\DirectApiV5\Dto\General\DeleteResponseBody;
use eLama\DirectApiV5\Dto\General\Enum\YesNoEnum;
use eLama\DirectApiV5\Dto\General\IdsCriteria;
use eLama\DirectApiV5\DtoDirectDriver;
use eLama\DirectApiV5\RequestBody\AddAdExtensionRequestBody;
use eLama\DirectApiV5\RequestBody\AddAdRequestBody;
use eLama\DirectApiV5\RequestBody\DeleteAdExtensionRequestBody;
use eLama\DirectApiV5\RequestBody\DeleteAdRequestBody;
use eLama\DirectApiV5\RequestBody\GetAdExtensionRequestBody;
use eLama\DirectApiV5\RequestBody\GetAdsRequestBody;
use eLama\DirectApiV5\Dto\Ad;
use eLama\DirectApiV5\Dto\AdExtensions;

class AdExtensionTest extends AdGroupExistenceDependantTestCase
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

    protected function setUp()
    {
        $this->driver = self::createDtoDirectDriver();
    }

    /**
     * @test
     */
    public function addAdExtension()
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

        $extensionId = $responseBody->getResult()->getAddResults()[0]->getId();
        assertThat($extensionId, is(integerValue()));

        return $extensionId;
    }

    /**
     * @test
     * @depends addAdExtension
     */
    public function getAdExtension($id)
    {
        $requestBody = new GetAdExtensionRequestBody(
            (new AdExtensionsSelectionCriteria())->setIds([$id])
        );

        /** @var AdExtensions\GetResponseBody $responseBody */
        $responseBody = $this->driver->call($requestBody)->wait()->getUnserializedBody();

        $adExtensionGetItem = $responseBody->getResult()->getAdExtensions()[0];
        assertThat($adExtensionGetItem->getId(), is(equalTo($id)));
        assertThat($adExtensionGetItem->getCallout()->getCalloutText(), is(equalTo('Крутое уточнение')));

        return $id;
    }

    /**
     * @test
     * @depends getAdExtension
     */
    public function addAdWithAdExtension($extensionId)
    {
        $adAddItem = new Ad\AdAddItem(self::$adGroupId);
        $textAd = new Ad\TextAdAdd(self::TEXT, self::TITLE, YesNoEnum::NO);
        $textAd->setAdExtensionIds([$extensionId]);
        $textAd->setHref('http://example.com');

        $adAddItem->setTextAd($textAd);

        $requestBody = new AddAdRequestBody(new Ad\AddRequest([$adAddItem]));

        /** @var AddResponseBody $responseBody */
        $responseBody = $this->driver->call($requestBody)->wait()->getUnserializedBody();

        $id = $responseBody->getResult()->getAddResults()[0]->getId();
        assertThat($id, is(integerValue()));

        return $id;
    }

    /**
     * @test
     * @depends addAdWithAdExtension
     * @depends getAdExtension
     */
    public function getAdWithAdExtensions($adId, $extensionId)
    {
        $requestBody = new GetAdsRequestBody(
            (new Ad\AdsSelectionCriteria())->setIds([$adId])
        );

        /** @var Ad\GetResponseBody $responseBody */
        $responseBody = $this->driver->call($requestBody)->wait()->getUnserializedBody();

        $adGetItem = $responseBody->getResult()->getAds()[0];
        assertThat($adGetItem->getTextAd()->getAdExtensions()[0]->getAdExtensionId(), is(equalTo($extensionId)));

        return $adId;
    }

    /**
     * @test
     * @depends getAdWithAdExtensions
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
     * @depends getAdExtension
     */
    public function deleteAdExtension($id)
    {
        $request = new DeleteAdExtensionRequestBody(
            new DeleteRequest(new IdsCriteria([$id]))
        );

        /** @var DeleteResponseBody $responseBody */
        $responseBody = $this->driver->call($request)->wait()->getUnserializedBody();
        $deletedId = $responseBody->getResult()->getDeleteResults()[0]->getId();

        assertThat($deletedId, is(equalTo($id)));

        return $id;
    }
}
