<?php

namespace eLama\DirectApiV5\Test\Integration\DtoAwareDirectDriver;

use eLama\DirectApiV5\DtoAwareDirectDriver;
use eLama\DirectApiV5\Dto\Vcard;
use eLama\DirectApiV5\RequestBody;

use eLama\DirectApiV5\RequestBody\AddAdRequestBody;

class VcardTest extends AdGroupExistenceDependantTestCase
{
    const COUNTRY_NAME = 'Гондурас';
    const CITY_NAME = 'Тегусигальпа';
    const COMPANY_NAME = 'good_workers';
    const WORK_TIME = '0;6;00;00;00;00';
    const STREET = 'Булевар Република де Франсия';

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
    public function add()
    {
        $vcardAddItem = $this->createVcardVCardAddItem();

        $addRequest = new Vcard\AddRequest([$vcardAddItem]);

        $requestBody = new RequestBody\AddVcardRequestBody($addRequest);
        /** @var \eLama\DirectApiV5\Dto\General\AddResponseBody $responseBody */
        $responseBody = $this->driver->call($requestBody)->wait()->getUnserializedBody();
        /** eLama\DirectApiV5\Dto\General\ExceptionNotification */
        var_dump($responseBody->getResult()->getAddResults()[0]->getErrors());
        die('stop it!');
    }

    /**
     * @return Vcard\VCardAddItem
     */
    private function createVcardVCardAddItem()
    {
        $phone = new Vcard\Phone(
            '+7',
            '812',
            '12345'
        );
        $phone->setExtension('256');
        $vcardAddItem = new Vcard\VCardAddItem(
            self::$campaignId,
            self::COUNTRY_NAME,
            self::CITY_NAME,
            self::COMPANY_NAME,
            self::WORK_TIME,
            $phone
        );

        $vcardAddItem->setStreet(self::STREET);
        $vcardAddItem->setHouse('1');
        $vcardAddItem->setBuilding('2');
        $vcardAddItem->setApartment('3');
        $instantMessenger = new Vcard\InstantMessenger('icq', 'Gondurasets');
        $vcardAddItem->setInstantMessenger($instantMessenger);
        $vcardAddItem->setExtraMessage('shaverma_iz_myshey');
        $vcardAddItem->setContactEmail('gondu@ras.com');
        $vcardAddItem->setOgrn('1234567891234');
        $vcardAddItem->setMetroStationId(1);

        $vcardAddItem->setPointOnMap(
            new Vcard\MapPoint(
                'X',
                'Y',
                'X1',
                'Y1',
                'X2',
                'Y2'
            )
        );
        $vcardAddItem->setContactPerson('Человек из Гондураса');
        $vcardAddItem->setWorkTime('0;3;10;0;18;0;4;6;10;0;11;0');

        return $vcardAddItem;
    }
}
