<?php

namespace eLama\DirectApiV5\Test\Integration\DtoAwareDirectDriver;

use eLama\DirectApiV5\Dto\Ad\AdAddItem;
use eLama\DirectApiV5\Dto\Ad\AddRequest;
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

class AdTest extends DirectCampaignExistenceDependantTestCase
{

    const TITLE = 'некий заголовок';
    const TEXT = 'Некоторый текст';
    const HREF = 'http://example.com';

    use AdGroupCarrier;

    /**
     * @var DtoAwareDirectDriver
     */
    private $driver;

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
    public function getAd($id)
    {
        $requestBody = new GetAdsRequestBody(
            (new AdsSelectionCriteria())->setIds([$id])
        );

        /** @var GetResponseBody $responseBody */
        $responseBody = $this->driver->call($requestBody)->wait()->getUnserializedBody();

        assertThat($responseBody->getResult()->getAds()[0]->getTextAd()->getTitle(), is(equalTo(self::TITLE)));
        assertThat($responseBody->getResult()->getAds()[0]->getTextAd()->getText(), is(equalTo(self::TEXT)));
        assertThat($responseBody->getResult()->getAds()[0]->getTextAd()->getHref(), is(equalTo(self::HREF)));

        return $id;
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
        $requestBody = new GetAdsRequestBody(
            (new AdsSelectionCriteria())->setIds([$id])
        );

        /** @var GetResponseBody $responseBody */
        $responseBody = $this->driver->call($requestBody)->wait()->getUnserializedBody();

        assertThat($responseBody->getResult()->getAds(), is(emptyArray()));
    }

    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();

        self::createAdGroup();
    }

    public static function tearDownAfterClass()
    {
        self::removeAdGroup();

        parent::tearDownAfterClass();
    }
}
