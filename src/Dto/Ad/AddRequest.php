<?php

namespace eLama\DirectApiV5\Dto\Ad;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class AddRequest
{

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Ad\AdAddItem>")
     *
     * @var AdAddItem[] $Ads
     */
    private $Ads;

    /**
     * @param AdAddItem[] $Ads
     */
    public function __construct(array $Ads)
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
     * @param AdAddItem[] $Ads
     * @return \eLama\DirectApiV5\Dto\Ad\AddRequest
     */
    public function setAds(array $Ads)
    {
      $this->Ads = $Ads;
      return $this;
    }

}
