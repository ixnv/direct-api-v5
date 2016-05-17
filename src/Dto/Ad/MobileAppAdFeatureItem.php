<?php

namespace eLama\DirectApiV5\Dto\Ad;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class MobileAppAdFeatureItem
{

    /**
     * @JMS\Type("string")
     *
     * @var MobileAppFeatureEnum $Feature
     */
    private $Feature;

    /**
     * @JMS\Type("string")
     *
     * @var YesNoEnum $Enabled
     */
    private $Enabled;

    /**
     * @param MobileAppFeatureEnum $Feature
     * @param YesNoEnum $Enabled
     */
    public function __construct($Feature = null, $Enabled = null)
    {
      $this->Feature = $Feature;
      $this->Enabled = $Enabled;
    }

    /**
     * @return MobileAppFeatureEnum
     */
    public function getFeature()
    {
      return $this->Feature;
    }

    /**
     * @param MobileAppFeatureEnum $Feature
     * @return \eLama\DirectApiV5\Dto\Ad\MobileAppAdFeatureItem
     */
    public function setFeature($Feature)
    {
      $this->Feature = $Feature;
      return $this;
    }

    /**
     * @return YesNoEnum
     */
    public function getEnabled()
    {
      return $this->Enabled;
    }

    /**
     * @param YesNoEnum $Enabled
     * @return \eLama\DirectApiV5\Dto\Ad\MobileAppAdFeatureItem
     */
    public function setEnabled($Enabled)
    {
      $this->Enabled = $Enabled;
      return $this;
    }

}
