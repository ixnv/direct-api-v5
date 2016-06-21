<?php

namespace eLama\DirectApiV5\Dto\Ad;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class AddRequest
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Ad\AdAddItem")
     *
     * @var AdAddItem $Ads
     */
    private $Ads;

    /**
     * @param AdAddItem $Ads
     */
    public function __construct(AdAddItem $Ads = null)
    {
      $this->Ads = $Ads;
    }

    /**
     * @return AdAddItem
     */
    public function getAds()
    {
      return $this->Ads;
    }

    /**
     * @param AdAddItem $Ads
     * @return \eLama\DirectApiV5\Dto\Ad\AddRequest
     */
    public function setAds(AdAddItem $Ads)
    {
      $this->Ads = $Ads;
      return $this;
    }

}
