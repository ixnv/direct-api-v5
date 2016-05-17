<?php

namespace eLama\DirectApiV5\Dto\Ad;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class MobileAppAdUpdate extends MobileAppAdBase
{

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Ad\MobileAppAdFeatureItem>")
     *
     * @var MobileAppAdFeatureItem[] $Features
     */
    private $Features;

    /**
     * @JMS\Type("string")
     *
     * @var MobAppAgeLabelEnum $AgeLabel
     */
    private $AgeLabel;

    /**
     * @return MobileAppAdFeatureItem[]
     */
    public function getFeatures()
    {
      return $this->Features;
    }

    /**
     * @param MobileAppAdFeatureItem[] $Features
     * @return \eLama\DirectApiV5\Dto\Ad\MobileAppAdUpdate
     */
    public function setFeatures(array $Features = null)
    {
      $this->Features = $Features;
      return $this;
    }

    /**
     * @return MobAppAgeLabelEnum
     */
    public function getAgeLabel()
    {
      return $this->AgeLabel;
    }

    /**
     * @param MobAppAgeLabelEnum $AgeLabel
     * @return \eLama\DirectApiV5\Dto\Ad\MobileAppAdUpdate
     */
    public function setAgeLabel($AgeLabel = null)
    {
      $this->AgeLabel = $AgeLabel;
      return $this;
    }

}
