<?php

namespace eLama\DirectApiV5\Test\Integration\DtoAwareDirectDriver;

use eLama\DirectApiV5\Dto\Ad\AdAddItem;
use eLama\DirectApiV5\Dto\Ad\AddRequest;
use eLama\DirectApiV5\Dto\Ad\DeleteRequest;
use eLama\DirectApiV5\Dto\Ad\TextAdAdd;
use eLama\DirectApiV5\Dto\Ad\YesNoEnum;
use eLama\DirectApiV5\Dto\General\AddResponseBody;
use eLama\DirectApiV5\Dto\General\DeleteResponseBody;
use eLama\DirectApiV5\Dto\General\IdsCriteria;
use eLama\DirectApiV5\DtoAwareDirectDriver;
use eLama\DirectApiV5\RequestBody\AddAdRequestBody;
use eLama\DirectApiV5\RequestBody\DeleteAdRequestBody;

class AdTest extends DirectCampaignExistenceDependantTestCase
{

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
        $textAd = new TextAdAdd('Некоторый текст', 'некий заголовок', YesNoEnum::NO);
        $textAd->setHref('http://example.com');
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
