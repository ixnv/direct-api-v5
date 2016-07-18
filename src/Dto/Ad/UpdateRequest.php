<?php

namespace eLama\DirectApiV5\Dto\Ad;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class UpdateRequest
{

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Ad\AdUpdateItem>")
     *
     * @var AdUpdateItem[] $Ads
     */
    private $Ads;

    /**
     * @param AdUpdateItem[] $Ads
     */
    public function __construct(array $Ads = [])
    {
      $this->Ads = $Ads;
    }

    /**
     * @return AdUpdateItem[]
     */
    public function getAds()
    {
      return $this->Ads;
    }

    /**
     * @param AdUpdateItem[] $Ads
     * @return \eLama\DirectApiV5\Dto\Ad\UpdateRequest
     */
    public function setAds(array $Ads)
    {
      $this->Ads = $Ads;

      return $this;
    }

}
