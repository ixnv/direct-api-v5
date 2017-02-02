<?php

namespace eLama\DirectApiV5\Dto\Ad;

use eLama\DirectApiV5\Dto\Ad\Enum\MobileAppFeatureEnum;
use eLama\DirectApiV5\Dto\General\Enum\YesNoEnum;
use eLama\DirectApiV5\Dto\General\Enum\YesNoUnknownEnum;
use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class MobileAppAdFeatureGetItem extends MobileAppAdFeatureItem
{

    /**
     * @JMS\Type("string")
     *
     * @var YesNoUnknownEnum $IsAvailable
     */
    private $IsAvailable;

    /**
     * @param MobileAppFeatureEnum $Feature
     * @param YesNoEnum $Enabled
     * @param YesNoUnknownEnum $IsAvailable
     */
    public function __construct($Feature = null, $Enabled = null, $IsAvailable = null)
    {
      parent::__construct($Feature, $Enabled);
      $this->IsAvailable = $IsAvailable;
    }

    /**
     * @return YesNoUnknownEnum
     */
    public function getIsAvailable()
    {
      return $this->IsAvailable;
    }

    /**
     * @param YesNoUnknownEnum $IsAvailable
     * @return \eLama\DirectApiV5\Dto\Ad\MobileAppAdFeatureGetItem
     */
    public function setIsAvailable($IsAvailable)
    {
      $this->IsAvailable = $IsAvailable;
      return $this;
    }

}
