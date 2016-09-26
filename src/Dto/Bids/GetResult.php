<?php

namespace eLama\DirectApiV5\Dto\Bids;

use eLama\DirectApiV5\Dto\General\GetResponseGeneral;
use eLama\DirectApiV5\Dto\General\GetResultGeneral;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class GetResult extends GetResultGeneral
{

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Bids\BidGetItem>")
     *
     * @var BidGetItem[]
     */
    private $Bids;

    /**
     * @param BidGetItem[] $Bids
     */
    public function __construct(array $Bids = null)
    {
        $this->Bids = $Bids;
    }

    /**
     * @return BidGetItem[]
     */
    public function getBids()
    {
        if ($this->Bids === null) {
            return [];
        }

        return $this->Bids;
    }

    /**
     * @param BidGetItem[] $Campaigns
     * @return GetResponseGeneral
     */
    public function setBids(array $Campaigns)
    {
        $this->Bids = $Campaigns;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->getBids();
    }
}
