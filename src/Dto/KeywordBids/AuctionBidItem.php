<?php

namespace eLama\DirectApiV5\Dto\KeywordBids;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class AuctionBidItem
{
    /**
     * @JMS\Type("integer")
     *
     * @var int $TrafficVolume
     */
    private $TrafficVolume;

    /**
     * @JMS\Type("integer")
     *
     * @var int $Bid
     */
    private $Bid;

    /**
     * @JMS\Type("integer")
     *
     * @var int $Price
     */
    private $Price;

    /**
     * @param int $TrafficVolume
     * @param int $Bid
     * @param int $Price
     */
    public function __construct($TrafficVolume = null, $Bid = null, $Price = null)
    {
      $this->TrafficVolume = $TrafficVolume;
      $this->Bid = $Bid;
      $this->Price = $Price;
    }

    /**
     * @return int
     */
    public function getTrafficVolume()
    {
      return $this->TrafficVolume;
    }

    /**
     * @param int $TrafficVolume
     * @return \eLama\DirectApiV5\Dto\KeywordBids\AuctionBidItem
     */
    public function setTrafficVolume($TrafficVolume)
    {
      $this->TrafficVolume = $TrafficVolume;

      return $this;
    }

    /**
     * @return int
     */
    public function getBid()
    {
      return $this->Bid;
    }

    /**
     * @param int $Bid
     * @return \eLama\DirectApiV5\Dto\KeywordBids\AuctionBidItem
     */
    public function setBid($Bid)
    {
      $this->Bid = $Bid;

      return $this;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
      return $this->Price;
    }

    /**
     * @param int $Price
     * @return \eLama\DirectApiV5\Dto\KeywordBids\AuctionBidItem
     */
    public function setPrice($Price)
    {
      $this->Price = $Price;

      return $this;
    }
}
