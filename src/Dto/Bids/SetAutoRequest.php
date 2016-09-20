<?php

namespace eLama\DirectApiV5\Dto\Bids;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class SetAutoRequest
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Bids\BidSetAutoItem")
     *
     * @var BidSetAutoItem $Bids
     */
    private $Bids;

    /**
     * @param BidSetAutoItem $Bids
     */
    public function __construct(BidSetAutoItem $Bids = null)
    {
      $this->Bids = $Bids;
    }

    /**
     * @return BidSetAutoItem
     */
    public function getBids()
    {
      return $this->Bids;
    }

    /**
     * @param BidSetAutoItem $Bids
     * @return \eLama\DirectApiV5\Dto\Bids\SetAutoRequest
     */
    public function setBids(BidSetAutoItem $Bids)
    {
      $this->Bids = $Bids;
      return $this;
    }

}
