<?php

namespace eLama\DirectApiV5\Dto\Bids;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class AuctionBidItem
{
    /**
     * @JMS\Type("string")
     *
     * @var string $Position
     */
    private $Position;

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
     * @param string $Position
     * @param int $Bid
     * @param int $Price
     */
    public function __construct($Position = null, $Bid = null, $Price = null)
    {
      $this->Position = $Position;
      $this->Bid = $Bid;
      $this->Price = $Price;
    }

    /**
     * @return string
     */
    public function getPosition()
    {
      return $this->Position;
    }

    /**
     * @param string $Position
     * @return \eLama\DirectApiV5\Dto\Bids\AuctionBidItem
     */
    public function setPosition($Position)
    {
      $this->Position = $Position;
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
     * @return \eLama\DirectApiV5\Dto\Bids\AuctionBidItem
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
     * @return \eLama\DirectApiV5\Dto\Bids\AuctionBidItem
     */
    public function setPrice($Price)
    {
      $this->Price = $Price;
      return $this;
    }

}
