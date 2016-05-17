<?php

namespace eLama\DirectApiV5\Dto\Ad;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class UpdateRequest
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Ad\AdUpdateItem")
     *
     * @var AdUpdateItem $Ads
     */
    private $Ads;

    /**
     * @param AdUpdateItem $Ads
     */
    public function __construct(AdUpdateItem $Ads = null)
    {
      $this->Ads = $Ads;
    }

    /**
     * @return AdUpdateItem
     */
    public function getAds()
    {
      return $this->Ads;
    }

    /**
     * @param AdUpdateItem $Ads
     * @return \eLama\DirectApiV5\Dto\Ad\UpdateRequest
     */
    public function setAds(AdUpdateItem $Ads)
    {
      $this->Ads = $Ads;
      return $this;
    }

}
