<?php

namespace eLama\DirectApiV5\Dto\Ad;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class AdUpdateItem
{

    /**
     * @JMS\Type("integer")
     *
     * @var int $Id
     */
    private $Id;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Ad\TextAdUpdate")
     *
     * @var TextAdUpdate $TextAd
     */
    private $TextAd;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Ad\DynamicTextAdUpdate")
     *
     * @var DynamicTextAdUpdate $DynamicTextAd
     */
    private $DynamicTextAd;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Ad\MobileAppAdUpdate")
     *
     * @var MobileAppAdUpdate $MobileAppAd
     */
    private $MobileAppAd;

    /**
     * @param int $Id
     */
    public function __construct($Id = null)
    {
      $this->Id = $Id;
    }

    /**
     * @return int
     */
    public function getId()
    {
      return $this->Id;
    }

    /**
     * @param int $Id
     * @return \eLama\DirectApiV5\Dto\Ad\AdUpdateItem
     */
    public function setId($Id)
    {
      $this->Id = $Id;
      return $this;
    }

    /**
     * @return TextAdUpdate
     */
    public function getTextAd()
    {
      return $this->TextAd;
    }

    /**
     * @param TextAdUpdate $TextAd
     * @return \eLama\DirectApiV5\Dto\Ad\AdUpdateItem
     */
    public function setTextAd(TextAdUpdate $TextAd = null)
    {
      $this->TextAd = $TextAd;
      return $this;
    }

    /**
     * @return DynamicTextAdUpdate
     */
    public function getDynamicTextAd()
    {
      return $this->DynamicTextAd;
    }

    /**
     * @param DynamicTextAdUpdate $DynamicTextAd
     * @return \eLama\DirectApiV5\Dto\Ad\AdUpdateItem
     */
    public function setDynamicTextAd(DynamicTextAdUpdate $DynamicTextAd = null)
    {
      $this->DynamicTextAd = $DynamicTextAd;
      return $this;
    }

    /**
     * @return MobileAppAdUpdate
     */
    public function getMobileAppAd()
    {
      return $this->MobileAppAd;
    }

    /**
     * @param MobileAppAdUpdate $MobileAppAd
     * @return \eLama\DirectApiV5\Dto\Ad\AdUpdateItem
     */
    public function setMobileAppAd(MobileAppAdUpdate $MobileAppAd = null)
    {
      $this->MobileAppAd = $MobileAppAd;
      return $this;
    }

}
