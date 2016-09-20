<?php

namespace eLama\DirectApiV5\Dto\Bids;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class GetResponse
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Bids\BidGetItem")
     *
     * @var BidGetItem $Bids
     */
    private $Bids;

    /**
     * @param BidGetItem $Bids
     */
    public function __construct(BidGetItem $Bids = null)
    {
      $this->Bids = $Bids;
    }

    /**
     * @return BidGetItem
     */
    public function getBids()
    {
      return $this->Bids;
    }

    /**
     * @param BidGetItem $Bids
     * @return \eLama\DirectApiV5\Dto\Bids\GetResponse
     */
    public function setBids(BidGetItem $Bids)
    {
      $this->Bids = $Bids;
      return $this;
    }

}
