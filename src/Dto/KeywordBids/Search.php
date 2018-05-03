<?php

namespace eLama\DirectApiV5\Dto\Keywordbids;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class Search
{

    /**
     * @JMS\Type("integer")
     *
     * @var int $Bid
     */
    private $Bid;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Keywordbids\AuctionBids")
     *
     * @var AuctionBids $AuctionBids
     */
    private $AuctionBids;

    /**
     * @return int
     */
    public function getBid()
    {
      return $this->Bid;
    }

    /**
     * @param int $Bid
     * @return \eLama\DirectApiV5\Dto\Keywordbids\Search
     */
    public function setBid(int $Bid = null)
    {
      $this->Bid = $Bid;
      return $this;
    }

    /**
     * @return AuctionBids
     */
    public function getAuctionBids()
    {
      return $this->AuctionBids;
    }

    /**
     * @param AuctionBids $AuctionBids
     * @return \eLama\DirectApiV5\Dto\Keywordbids\Search
     */
    public function setAuctionBids(AuctionBids $AuctionBids = null)
    {
      $this->AuctionBids = $AuctionBids;
      return $this;
    }

}
