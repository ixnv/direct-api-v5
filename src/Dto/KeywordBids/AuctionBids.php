<?php

namespace eLama\DirectApiV5\Dto\KeywordBids;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class AuctionBids
{
    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\KeywordBids\AuctionBidItem>")
     *
     * @var AuctionBidItem[] $AuctionBidItems
     */
    private $AuctionBidItems;

    /**
     * @return AuctionBidItem[]
     */
    public function getAuctionBidItems()
    {
      return $this->AuctionBidItems;
    }

    /**
     * @param AuctionBidItem[] $AuctionBidItems
     * @return \eLama\DirectApiV5\Dto\Keywordbids\AuctionBids
     */
    public function setAuctionBidItems(array $AuctionBidItems = null)
    {
      $this->AuctionBidItems = $AuctionBidItems;

      return $this;
    }
}
