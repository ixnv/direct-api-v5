<?php

namespace eLama\DirectApiV5\Dto\Vcard;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class VCardGetItem
{

    /**
     * @JMS\Type("integer")
     *
     * @var int $Id
     */
    private $Id;

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
     * @var string $CompanyName
     */
    private $CompanyName;

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
     * @return int
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * @param int $Id
     * @return \eLama\DirectApiV5\Dto\Vcard\VCardGetItem
     */
    public function setId($Id)
    {
        $this->Id = $Id;

        return $this;
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
     * @return \eLama\DirectApiV5\Dto\Vcard\VCardGetItem
     */
    public function setCampaignId($CampaignId = null)
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
     * @return \eLama\DirectApiV5\Dto\Vcard\VCardGetItem
     */
    public function setCountry($Country = null)
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
     * @return \eLama\DirectApiV5\Dto\Vcard\VCardGetItem
     */
    public function setCity($City = null)
    {
        $this->City = $City;

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
     * @return \eLama\DirectApiV5\Dto\Vcard\VCardGetItem
     */
    public function setWorkTime($WorkTime = null)
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
     * @return \eLama\DirectApiV5\Dto\Vcard\VCardGetItem
     */
    public function setPhone(Phone $Phone = null)
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
     * @return \eLama\DirectApiV5\Dto\Vcard\VCardGetItem
     */
    public function setStreet($Street = null)
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
     * @return \eLama\DirectApiV5\Dto\Vcard\VCardGetItem
     */
    public function setHouse($House = null)
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
     * @return \eLama\DirectApiV5\Dto\Vcard\VCardGetItem
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
     * @return \eLama\DirectApiV5\Dto\Vcard\VCardGetItem
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
     * @return \eLama\DirectApiV5\Dto\Vcard\VCardGetItem
     */
    public function setInstantMessenger(InstantMessenger $InstantMessenger = null)
    {
        $this->InstantMessenger = $InstantMessenger;

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
     * @return \eLama\DirectApiV5\Dto\Vcard\VCardGetItem
     */
    public function setCompanyName($CompanyName = null)
    {
        $this->CompanyName = $CompanyName;

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
     * @return \eLama\DirectApiV5\Dto\Vcard\VCardGetItem
     */
    public function setExtraMessage($ExtraMessage = null)
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
     * @return \eLama\DirectApiV5\Dto\Vcard\VCardGetItem
     */
    public function setContactEmail($ContactEmail = null)
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
     * @return \eLama\DirectApiV5\Dto\Vcard\VCardGetItem
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
     * @return \eLama\DirectApiV5\Dto\Vcard\VCardGetItem
     */
    public function setMetroStationId($MetroStationId = null)
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
     * @return \eLama\DirectApiV5\Dto\Vcard\VCardGetItem
     */
    public function setPointOnMap(MapPoint $PointOnMap = null)
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
     * @return \eLama\DirectApiV5\Dto\Vcard\VCardGetItem
     */
    public function setContactPerson($ContactPerson = null)
    {
        $this->ContactPerson = $ContactPerson;

        return $this;
    }
}
