<?php

namespace eLama\DirectApiV5\Test\Integration\DtoAwareDirectDriver;

use eLama\DirectApiV5\DtoAwareDirectDriver;
use eLama\DirectApiV5\Dto\Vcard;
use eLama\DirectApiV5\RequestBody;
use eLama\DirectApiV5\RequestBody\AddAdRequestBody;

class VcardTest extends AdGroupExistenceDependantTestCase
{
    const COUNTRY_NAME = 'Russia';
    const CITY_NAME = 'Moscow';
    const COMPANY_NAME = 'Some Company DvKqXuiphd';
    const WORK_TIME = '0;3;10;0;18;0;4;6;10;0;11;0';
    const STREET = 'Охотный ряд';
    const EXTRA_MESSAGE = 'some message';
    const CONTACT_EMAIL = 'test@mail.ru';
    const OGRN = '1097847055855';
    const CONTACT_PERSON = 'contact person ';

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

        $id = $responseBody->getResult()->getAddResults()[0]->getId();
        $this->assertNotNull($id);
        assertThat($id, is(typeOf('integer')));

        return $id;
    }

    /**
     * @test
     */
    public function get()
    {

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
        $phone->setExtension('89');
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
        $instantMessenger = new Vcard\InstantMessenger('icq', '123-456-789');
        $vcardAddItem->setInstantMessenger($instantMessenger);
        $vcardAddItem->setExtraMessage(self::EXTRA_MESSAGE);
        $vcardAddItem->setContactEmail(self::CONTACT_EMAIL);
        $vcardAddItem->setOgrn(self::OGRN);
        $vcardAddItem->setPointOnMap(
            new Vcard\MapPoint(
                '39.724068',
                '47.222555',
                '39.722020',
                '47.221160',
                '39.726116',
                '47.223951'
            )
        );
        $vcardAddItem->setContactPerson(self::CONTACT_PERSON);

        return $vcardAddItem;
    }
}
