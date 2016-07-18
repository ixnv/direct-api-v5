<?php

namespace eLama\DirectApiV5\Dto\AdGroup;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class MobileAppAdGroupAdd
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
     * @param string $StoreUrl
     * @param TargetDeviceTypeEnum[] $TargetDeviceType
     * @param string $TargetCarrier see TargetCarrierEnum
     * @param string $TargetOperatingSystemVersion
     */
    public function __construct($StoreUrl, array $TargetDeviceType, $TargetCarrier, $TargetOperatingSystemVersion)
    {
      $this->StoreUrl = $StoreUrl;
      $this->TargetDeviceType = $TargetDeviceType;
      $this->TargetCarrier = $TargetCarrier;
      $this->TargetOperatingSystemVersion = $TargetOperatingSystemVersion;
    }

    /**
     * @return string
     */
    public function getStoreUrl()
    {
      return $this->StoreUrl;
    }

    /**
     * @param string $StoreUrl
     * @return \eLama\DirectApiV5\Dto\AdGroup\MobileAppAdGroupAdd
     */
    public function setStoreUrl($StoreUrl)
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
     * @return \eLama\DirectApiV5\Dto\AdGroup\MobileAppAdGroupAdd
     */
    public function setTargetDeviceType(array $TargetDeviceType)
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
     * @return \eLama\DirectApiV5\Dto\AdGroup\MobileAppAdGroupAdd
     */
    public function setTargetCarrier($TargetCarrier)
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
     * @return \eLama\DirectApiV5\Dto\AdGroup\MobileAppAdGroupAdd
     */
    public function setTargetOperatingSystemVersion($TargetOperatingSystemVersion)
    {
      $this->TargetOperatingSystemVersion = $TargetOperatingSystemVersion;
      return $this;
    }

}
