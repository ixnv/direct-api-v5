<?php

namespace eLama\DirectApiV5\Dto\AdGroup;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class MobileAppAdGroupUpdate
{

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
     * @return TargetDeviceTypeEnum[]
     */
    public function getTargetDeviceType()
    {
      return $this->TargetDeviceType;
    }

    /**
     * @param TargetDeviceTypeEnum[] $TargetDeviceType
     * @return \eLama\DirectApiV5\Dto\AdGroup\MobileAppAdGroupUpdate
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
     * @return \eLama\DirectApiV5\Dto\AdGroup\MobileAppAdGroupUpdate
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
     * @return \eLama\DirectApiV5\Dto\AdGroup\MobileAppAdGroupUpdate
     */
    public function setTargetOperatingSystemVersion($TargetOperatingSystemVersion = null)
    {
      $this->TargetOperatingSystemVersion = $TargetOperatingSystemVersion;
      return $this;
    }

}
