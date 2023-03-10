<?php

namespace eLama\DirectApiV5\Dto\Ad;

use eLama\DirectApiV5\Dto\General\GetResultGeneral;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class GetResult extends GetResultGeneral
{

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Ad\AdGetItem>")
     *
     * @var AdGetItem[] $Ads
     */
    private $Ads = [];

    /**
     * @param AdGetItem[] $Ads
     */
    public function __construct(array $Ads = null)
    {
        $this->Ads = $Ads;
    }

    /**
     * @return AdGetItem[]
     */
    public function getAds()
    {
        if ($this->Ads === null) {
            return [];
        }

        return $this->Ads;
    }

    /**
     * @param AdGetItem[] $Ads
     * @return self
     */
    public function setAds(array $Ads)
    {
        $this->Ads = $Ads;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->getAds();
    }
}
