<?php

namespace eLama\DirectApiV5\Dto\AdGroup;

use eLama\DirectApiV5\Dto\AdGroup\Enum\AppAvailabilityStatusEnum;
use eLama\DirectApiV5\Dto\AdGroup\Enum\TargetCarrierEnum;
use eLama\DirectApiV5\Dto\AdGroup\Enum\TargetDeviceTypeEnum;
use eLama\DirectApiV5\Dto\General\Enum\MobileOperatingSystemTypeEnum;
use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class MobileAppAdGroupGet
{

    /**
     * @JMS\Type("string")
     *
     * @var string $StoreUrl
     */
    private $StoreUrl;

    /**
     * @JMS\Type("array<string>")
     *
     * @var TargetDeviceTypeEnum[] $TargetDeviceType
     */
    private $TargetDeviceType;

    /**
     * @JMS\Type("string")
     *
     * @var TargetCarrierEnum $TargetCarrier
     */
    private $TargetCarrier;

    /**
     * @JMS\Type("string")
     *
     * @var string $TargetOperatingSystemVersion
     */
    private $TargetOperatingSystemVersion;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\AdGroup\ExtensionModeration")
     *
     * @var ExtensionModeration $AppIconModeration
     */
    private $AppIconModeration;

    /**
     * @JMS\Type("string")
     *
     * @var MobileOperatingSystemTypeEnum $AppOperatingSystemType
     */
    private $AppOperatingSystemType;

    /**
     * @JMS\Type("string")
     *
     * @var AppAvailabilityStatusEnum $AppAvailabilityStatus
     */
    private $AppAvailabilityStatus;

    /**
     * @return string
     */
    public function getStoreUrl()
    {
      return $this->StoreUrl;
    }

    /**
     * @param string $StoreUrl
     * @return \eLama\DirectApiV5\Dto\AdGroup\MobileAppAdGroupGet
     */
    public function setStoreUrl($StoreUrl = null)
    {
      $this->StoreUrl = $StoreUrl;
      return $this;
    }

    /**
     * @return TargetDeviceTypeEnum[]
     */
    public function getTargetDeviceType()
    {
      return $this->TargetDeviceType;
    }

    /**
     * @param TargetDeviceTypeEnum[] $TargetDeviceType
     * @return \eLama\DirectApiV5\Dto\AdGroup\MobileAppAdGroupGet
     */
    public function setTargetDeviceType(array $TargetDeviceType = null)
    {
      $this->TargetDeviceType = $TargetDeviceType;
      return $this;
    }

    /**
     * @return TargetCarrierEnum
     */
    public function getTargetCarrier()
    {
      return $this->TargetCarrier;
    }

    /**
     * @param TargetCarrierEnum $TargetCarrier
     * @return \eLama\DirectApiV5\Dto\AdGroup\MobileAppAdGroupGet
     */
    public function setTargetCarrier($TargetCarrier = null)
    {
      $this->TargetCarrier = $TargetCarrier;
      return $this;
    }

    /**
     * @return string
     */
    public function getTargetOperatingSystemVersion()
    {
      return $this->TargetOperatingSystemVersion;
    }

    /**
     * @param string $TargetOperatingSystemVersion
     * @return \eLama\DirectApiV5\Dto\AdGroup\MobileAppAdGroupGet
     */
    public function setTargetOperatingSystemVersion($TargetOperatingSystemVersion = null)
    {
      $this->TargetOperatingSystemVersion = $TargetOperatingSystemVersion;
      return $this;
    }

    /**
     * @return ExtensionModeration
     */
    public function getAppIconModeration()
    {
      return $this->AppIconModeration;
    }

    /**
     * @param ExtensionModeration $AppIconModeration
     * @return \eLama\DirectApiV5\Dto\AdGroup\MobileAppAdGroupGet
     */
    public function setAppIconModeration(ExtensionModeration $AppIconModeration = null)
    {
      $this->AppIconModeration = $AppIconModeration;
      return $this;
    }

    /**
     * @return MobileOperatingSystemTypeEnum
     */
    public function getAppOperatingSystemType()
    {
      return $this->AppOperatingSystemType;
    }

    /**
     * @param MobileOperatingSystemTypeEnum $AppOperatingSystemType
     * @return \eLama\DirectApiV5\Dto\AdGroup\MobileAppAdGroupGet
     */
    public function setAppOperatingSystemType($AppOperatingSystemType = null)
    {
      $this->AppOperatingSystemType = $AppOperatingSystemType;
      return $this;
    }

    /**
     * @return AppAvailabilityStatusEnum
     */
    public function getAppAvailabilityStatus()
    {
      return $this->AppAvailabilityStatus;
    }

    /**
     * @param AppAvailabilityStatusEnum $AppAvailabilityStatus
     * @return \eLama\DirectApiV5\Dto\AdGroup\MobileAppAdGroupGet
     */
    public function setAppAvailabilityStatus($AppAvailabilityStatus = null)
    {
      $this->AppAvailabilityStatus = $AppAvailabilityStatus;
      return $this;
    }

}
