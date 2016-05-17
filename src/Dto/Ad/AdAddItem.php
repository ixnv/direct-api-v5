<?php

namespace eLama\DirectApiV5\Dto\Ad;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class AdAddItem extends AdAddItemBase
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Ad\TextAdAdd")
     *
     * @var TextAdAdd $TextAd
     */
    private $TextAd;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Ad\DynamicTextAdAdd")
     *
     * @var DynamicTextAdAdd $DynamicTextAd
     */
    private $DynamicTextAd;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Ad\MobileAppAdAdd")
     *
     * @var MobileAppAdAdd $MobileAppAd
     */
    private $MobileAppAd;

    /**
     * @param int $AdGroupId
     */
    public function __construct($AdGroupId = null)
    {
      parent::__construct($AdGroupId);
    }

    /**
     * @return TextAdAdd
     */
    public function getTextAd()
    {
      return $this->TextAd;
    }

    /**
     * @param TextAdAdd $TextAd
     * @return \eLama\DirectApiV5\Dto\Ad\AdAddItem
     */
    public function setTextAd(TextAdAdd $TextAd = null)
    {
      $this->TextAd = $TextAd;
      return $this;
    }

    /**
     * @return DynamicTextAdAdd
     */
    public function getDynamicTextAd()
    {
      return $this->DynamicTextAd;
    }

    /**
     * @param DynamicTextAdAdd $DynamicTextAd
     * @return \eLama\DirectApiV5\Dto\Ad\AdAddItem
     */
    public function setDynamicTextAd(DynamicTextAdAdd $DynamicTextAd = null)
    {
      $this->DynamicTextAd = $DynamicTextAd;
      return $this;
    }

    /**
     * @return MobileAppAdAdd
     */
    public function getMobileAppAd()
    {
      return $this->MobileAppAd;
    }

    /**
     * @param MobileAppAdAdd $MobileAppAd
     * @return \eLama\DirectApiV5\Dto\Ad\AdAddItem
     */
    public function setMobileAppAd(MobileAppAdAdd $MobileAppAd = null)
    {
      $this->MobileAppAd = $MobileAppAd;
      return $this;
    }

}
