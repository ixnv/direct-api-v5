<?php

namespace eLama\DirectApiV5\Dto\Vcard;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class VCardAddItem
{

    /**
     * @JMS\Type("integer")
     *
     * @var int $CampaignId
     */
    private $CampaignId;

    /**
     * @JMS\Type("string")
     *
     * @var string $Country
     */
    private $Country;

    /**
     * @JMS\Type("string")
     *
     * @var string $City
     */
    private $City;

    /**
     * @JMS\Type("string")
     *
     * @var string $CompanyName
     */
    private $CompanyName;

    /**
     * @JMS\Type("string")
     *
     * @var string $WorkTime
     */
    private $WorkTime;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Vcard\Phone")
     *
     * @var Phone $Phone
     */
    private $Phone;

    /**
     * @JMS\Type("string")
     *
     * @var string $Street
     */
    private $Street;

    /**
     * @JMS\Type("string")
     *
     * @var string $House
     */
    private $House;

    /**
     * @JMS\Type("string")
     *
     * @var string $Building
     */
    private $Building;

    /**
     * @JMS\Type("string")
     *
     * @var string $Apartment
     */
    private $Apartment;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Vcard\InstantMessenger")
     *
     * @var InstantMessenger $InstantMessenger
     */
    private $InstantMessenger;

    /**
     * @JMS\Type("string")
     *
     * @var string $ExtraMessage
     */
    private $ExtraMessage;

    /**
     * @JMS\Type("string")
     *
     * @var string $ContactEmail
     */
    private $ContactEmail;

    /**
     * @JMS\Type("string")
     *
     * @var string $Ogrn
     */
    private $Ogrn;

    /**
     * @JMS\Type("integer")
     *
     * @var int $MetroStationId
     */
    private $MetroStationId;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Vcard\MapPoint")
     *
     * @var MapPoint $PointOnMap
     */
    private $PointOnMap;

    /**
     * @JMS\Type("string")
     *
     * @var string $ContactPerson
     */
    private $ContactPerson;

    /**
     * @param int $CampaignId
     * @param string $Country
     * @param string $City
     * @param string $CompanyName
     * @param string $WorkTime
     * @param Phone $Phone
     */
    public function __construct(
        $CampaignId,
        $Country,
        $City,
        $CompanyName,
        $WorkTime,
        Phone $Phone
    ) {
        $this->CampaignId = $CampaignId;
        $this->Country = $Country;
        $this->City = $City;
        $this->CompanyName = $CompanyName;
        $this->WorkTime = $WorkTime;
        $this->Phone = $Phone;
    }

    /**
     * @return int
     */
    public function getCampaignId()
    {
        return $this->CampaignId;
    }

    /**
     * @param int $CampaignId
     * @return \eLama\DirectApiV5\Dto\Vcard\VCardAddItem
     */
    public function setCampaignId($CampaignId)
    {
        $this->CampaignId = $CampaignId;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->Country;
    }

    /**
     * @param string $Country
     * @return \eLama\DirectApiV5\Dto\Vcard\VCardAddItem
     */
    public function setCountry($Country)
    {
        $this->Country = $Country;

        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->City;
    }

    /**
     * @param string $City
     * @return \eLama\DirectApiV5\Dto\Vcard\VCardAddItem
     */
    public function setCity($City)
    {
        $this->City = $City;

        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyName()
    {
        return $this->CompanyName;
    }

    /**
     * @param string $CompanyName
     * @return \eLama\DirectApiV5\Dto\Vcard\VCardAddItem
     */
    public function setCompanyName($CompanyName)
    {
        $this->CompanyName = $CompanyName;

        return $this;
    }

    /**
     * @return string
     */
    public function getWorkTime()
    {
        return $this->WorkTime;
    }

    /**
     * @param string $WorkTime
     * @return \eLama\DirectApiV5\Dto\Vcard\VCardAddItem
     */
    public function setWorkTime($WorkTime)
    {
        $this->WorkTime = $WorkTime;

        return $this;
    }

    /**
     * @return Phone
     */
    public function getPhone()
    {
        return $this->Phone;
    }

    /**
     * @param Phone $Phone
     * @return \eLama\DirectApiV5\Dto\Vcard\VCardAddItem
     */
    public function setPhone(Phone $Phone)
    {
        $this->Phone = $Phone;

        return $this;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->Street;
    }

    /**
     * @param string $Street
     * @return \eLama\DirectApiV5\Dto\Vcard\VCardAddItem
     */
    public function setStreet($Street)
    {
        $this->Street = $Street;

        return $this;
    }

    /**
     * @return string
     */
    public function getHouse()
    {
        return $this->House;
    }

    /**
     * @param string $House
     * @return \eLama\DirectApiV5\Dto\Vcard\VCardAddItem
     */
    public function setHouse($House)
    {
        $this->House = $House;

        return $this;
    }

    /**
     * @return string
     */
    public function getBuilding()
    {
        return $this->Building;
    }

    /**
     * @param string $Building
     * @return \eLama\DirectApiV5\Dto\Vcard\VCardAddItem
     */
    public function setBuilding($Building = null)
    {
        $this->Building = $Building;

        return $this;
    }

    /**
     * @return string
     */
    public function getApartment()
    {
        return $this->Apartment;
    }

    /**
     * @param string $Apartment
     * @return \eLama\DirectApiV5\Dto\Vcard\VCardAddItem
     */
    public function setApartment($Apartment = null)
    {
        $this->Apartment = $Apartment;

        return $this;
    }

    /**
     * @return InstantMessenger
     */
    public function getInstantMessenger()
    {
        return $this->InstantMessenger;
    }

    /**
     * @param InstantMessenger $InstantMessenger
     * @return \eLama\DirectApiV5\Dto\Vcard\VCardAddItem
     */
    public function setInstantMessenger(InstantMessenger $InstantMessenger = null)
    {
        $this->InstantMessenger = $InstantMessenger;

        return $this;
    }

    /**
     * @return string
     */
    public function getExtraMessage()
    {
        return $this->ExtraMessage;
    }

    /**
     * @param string $ExtraMessage
     * @return \eLama\DirectApiV5\Dto\Vcard\VCardAddItem
     */
    public function setExtraMessage($ExtraMessage)
    {
        $this->ExtraMessage = $ExtraMessage;

        return $this;
    }

    /**
     * @return string
     */
    public function getContactEmail()
    {
        return $this->ContactEmail;
    }

    /**
     * @param string $ContactEmail
     * @return \eLama\DirectApiV5\Dto\Vcard\VCardAddItem
     */
    public function setContactEmail($ContactEmail)
    {
        $this->ContactEmail = $ContactEmail;

        return $this;
    }

    /**
     * @return string
     */
    public function getOgrn()
    {
        return $this->Ogrn;
    }

    /**
     * @param string $Ogrn
     * @return \eLama\DirectApiV5\Dto\Vcard\VCardAddItem
     */
    public function setOgrn($Ogrn = null)
    {
        $this->Ogrn = $Ogrn;

        return $this;
    }

    /**
     * @return int
     */
    public function getMetroStationId()
    {
        return $this->MetroStationId;
    }

    /**
     * @param int $MetroStationId
     * @return \eLama\DirectApiV5\Dto\Vcard\VCardAddItem
     */
    public function setMetroStationId($MetroStationId)
    {
        $this->MetroStationId = $MetroStationId;

        return $this;
    }

    /**
     * @return MapPoint
     */
    public function getPointOnMap()
    {
        return $this->PointOnMap;
    }

    /**
     * @param MapPoint $PointOnMap
     * @return \eLama\DirectApiV5\Dto\Vcard\VCardAddItem
     */
    public function setPointOnMap(MapPoint $PointOnMap)
    {
        $this->PointOnMap = $PointOnMap;

        return $this;
    }

    /**
     * @return string
     */
    public function getContactPerson()
    {
        return $this->ContactPerson;
    }

    /**
     * @param string $ContactPerson
     * @return \eLama\DirectApiV5\Dto\Vcard\VCardAddItem
     */
    public function setContactPerson($ContactPerson)
    {
        $this->ContactPerson = $ContactPerson;

        return $this;
    }

}
