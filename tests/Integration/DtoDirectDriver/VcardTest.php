<?php

namespace eLama\DirectApiV5\Test\Integration\DtoDirectDriver;

use eLama\DirectApiV5\DtoDirectDriver;
use eLama\DirectApiV5\Dto\General\IdsCriteria;
use eLama\DirectApiV5\RequestBody;
use eLama\DirectApiV5\Dto\Vcard;

class VcardTest extends DirectCampaignExistenceDependantTestCase
{
    const COUNTRY_NAME = 'Russia';
    const CITY_NAME = 'Moscow';
    const COMPANY_NAME = 'Some Company DvKqXuiphd';
    const WORK_TIME = '0;3;10;0;18;0;4;6;10;0;11;0';
    const STREET = 'Охотный ряд';
    const EXTRA_MESSAGE = 'some message';
    const CONTACT_EMAIL = 'test@mail.ru';
    const OGRN = '1097847055855';
    const CONTACT_PERSON = 'contact person';

    /** @var Vcard\MapPoint */
    private $mapPoint;
    /** @var  Vcard\Phone */
    private $phone;
    /** @var Vcard\InstantMessenger */
    private $instantMessenger;

    /**
     * @var DtoDirectDriver
     */
    private $driver;

    protected function setUp()
    {
        $this->driver = self::createDtoDirectDriver();
        $this->createNestedEntitiesForRequestAndCompare();
    }

    /**
     * @test
     */
    public function add()
    {
        $vcardAddItem = $this->createVCardAddItem();

        $addRequest = new Vcard\AddRequest([$vcardAddItem]);

        $requestBody = new RequestBody\AddVcardRequestBody($addRequest);
        /** @var \eLama\DirectApiV5\Dto\General\AddResponseBody $responseBody */
        $responseBody = $this->driver->call($requestBody)->wait()->getUnserializedBody();

        $id = $responseBody->getResult()->getAddResults()[0]->getId();
        assertThat($id, is(typeOf('integer')));

        return $id;
    }

    /**
     * @test
     * @depends add
     * @param int $vCardId
     * @return int
     */
    public function get($vCardId)
    {
        $requestBody = new RequestBody\GetVcardRequestBody((new IdsCriteria())->setIds([$vCardId]));
        $requestBody->setLimit(5);
        $requestBody->setOffset(0);

        /** @var \eLama\DirectApiV5\Dto\Vcard\GetResponseBody $responseBody */
        $responseBody = $this->driver->call($requestBody)->wait()->getUnserializedBody();

        /** @var \eLama\DirectApiV5\Dto\Vcard\VCardGetItem $vcardGetItem */
        $vcardGetItem = $responseBody->getResult()->getVCards()[0];

        $this->assertVcardGetItem($vcardGetItem);

        return $vcardGetItem->getId();
    }

    /**
     * @test
     * @depends get
     * @param int $vCardId
     */
    public function delete($vCardId)
    {
        $requestBody = new RequestBody\DeleteVcardRequestBody(
            new Vcard\DeleteRequest(
                new IdsCriteria([$vCardId])
            )
        );

        /** @var \eLama\DirectApiV5\Dto\General\DeleteResponseBody $responseBody */
        $responseBody = $this->driver->call($requestBody)->wait()->getUnserializedBody();

        $vcards = $responseBody->getResult()->getDeleteResults();

        assertThat($vcards[0]->getId(), is(equalTo($vCardId)));
        assertThat($vcards[0]->getErrors(), is(emptyArray()));
        assertThat($vcards[0]->getWarnings(), is(emptyArray()));
    }

    /**
     * @return Vcard\VCardAddItem
     */
    private function createVCardAddItem()
    {
        $vcardAddItem = new Vcard\VCardAddItem(
            self::$campaignId,
            self::COUNTRY_NAME,
            self::CITY_NAME,
            self::COMPANY_NAME,
            self::WORK_TIME,
            $this->phone
        );

        $vcardAddItem->setStreet(self::STREET);
        $vcardAddItem->setHouse('1');
        $vcardAddItem->setBuilding('2');
        $vcardAddItem->setApartment('3');
        $vcardAddItem->setInstantMessenger($this->instantMessenger);
        $vcardAddItem->setExtraMessage(self::EXTRA_MESSAGE);
        $vcardAddItem->setContactEmail(self::CONTACT_EMAIL);
        $vcardAddItem->setOgrn(self::OGRN);
        $vcardAddItem->setPointOnMap($this->mapPoint);
        $vcardAddItem->setContactPerson(self::CONTACT_PERSON);

        return $vcardAddItem;
    }

    private function createNestedEntitiesForRequestAndCompare()
    {
        $this->instantMessenger = new Vcard\InstantMessenger('icq', '123-456-789');
        $this->phone = new Vcard\Phone(
            '+7',
            '812',
            '1-23-45'
        );
        $this->mapPoint = new Vcard\MapPoint(
            '39.724068',
            '47.222555',
            '39.722020',
            '47.221160',
            '39.726116',
            '47.223951'
        );
    }

    /**
     * @param Vcard\VCardGetItem $vCardGetItem
     */
    private function assertVcardGetItem(Vcard\VCardGetItem $vCardGetItem)
    {
        $this->assertEquals(self::COMPANY_NAME, $vCardGetItem->getCompanyName());
        $this->assertEquals(self::CITY_NAME, $vCardGetItem->getCity());
        $this->assertEquals(self::EXTRA_MESSAGE, $vCardGetItem->getExtraMessage());
        $this->assertEquals(self::CONTACT_EMAIL, $vCardGetItem->getContactEmail());
        $this->assertEquals(self::CONTACT_PERSON, $vCardGetItem->getContactPerson());
        $this->assertEquals($this->mapPoint, $vCardGetItem->getPointOnMap());
        $this->assertEquals($this->phone, $vCardGetItem->getPhone());
        $this->assertEquals($this->instantMessenger, $vCardGetItem->getInstantMessenger());
    }
}
