<?php

namespace eLama\DirectApiV5\Dto\Vcard;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class Phone
{
    /**
     * @JMS\Type("string")
     *
     * @var string $CountryCode
     */
    private $CountryCode;

    /**
     * @JMS\Type("string")
     *
     * @var string $CityCode
     */
    private $CityCode;

    /**
     * @JMS\Type("string")
     *
     * @var string $PhoneNumber
     */
    private $PhoneNumber;

    /**
     * @JMS\Type("string")
     *
     * @var string $Extension
     */
    private $Extension;

    /**
     * @param string $countryCode
     * @param string $cityCode
     * @param string $phoneNumber
     */
    public function __construct($countryCode = null, $cityCode = null, $phoneNumber = null)
    {
        $this->CountryCode = $countryCode;
        $this->CityCode = $cityCode;
        $this->PhoneNumber = $phoneNumber;
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->CountryCode;
    }

    /**
     * @param string $CountryCode
     * @return \eLama\DirectApiV5\Dto\Vcard\Phone
     */
    public function setCountryCode($CountryCode)
    {
        $this->CountryCode = $CountryCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getCityCode()
    {
        return $this->CityCode;
    }

    /**
     * @param string $CityCode
     * @return \eLama\DirectApiV5\Dto\Vcard\Phone
     */
    public function setCityCode($CityCode)
    {
        $this->CityCode = $CityCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->PhoneNumber;
    }

    /**
     * @param string $PhoneNumber
     * @return \eLama\DirectApiV5\Dto\Vcard\Phone
     */
    public function setPhoneNumber($PhoneNumber)
    {
        $this->PhoneNumber = $PhoneNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getExtension()
    {
        return $this->Extension;
    }

    /**
     * @param string $Extension
     * @return \eLama\DirectApiV5\Dto\Vcard\Phone
     */
    public function setExtension($Extension)
    {
        $this->Extension = $Extension;

        return $this;
    }

}
