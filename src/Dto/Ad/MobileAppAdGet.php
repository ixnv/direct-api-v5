<?php

namespace eLama\DirectApiV5\Dto\Ad;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class MobileAppAdGet extends MobileAppAdBase
{

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Ad\MobileAppAdFeatureGetItem>")
     *
     * @var MobileAppAdFeatureGetItem[] $Features
     */
    private $Features;

    /**
     * @return MobileAppAdFeatureGetItem[]
     */
    public function getFeatures()
    {
      return $this->Features;
    }

    /**
     * @param MobileAppAdFeatureGetItem[] $Features
     * @return \eLama\DirectApiV5\Dto\Ad\MobileAppAdGet
     */
    public function setFeatures(array $Features = null)
    {
      $this->Features = $Features;
      return $this;
    }

}
