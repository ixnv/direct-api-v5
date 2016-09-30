<?php

namespace eLama\DirectApiV5\Dto\Bids;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class SetRequest
{
    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Bids\BidSetItem>")
     *
     * @var BidSetItem[] $Bids
     */
    private $Bids;

    /**
     * @param BidSetItem[] $Bids
     */
    public function __construct(array $Bids = null)
    {
      $this->Bids = $Bids;
    }

    /**
     * @return BidSetItem[]
     */
    public function getBids()
    {
      return $this->Bids;
    }

    /**
     * @param BidSetItem $Bids
     * @return \eLama\DirectApiV5\Dto\Bids\SetRequest
     */
    public function setBids(BidSetItem $Bids)
    {
      $this->Bids = $Bids;
      return $this;
    }
}
