<?php

namespace eLama\DirectApiV5\Dto\Bids;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class BidGetItem extends BidBase
{
    /**
     * @JMS\Type("integer")
     *
     * @var int $Bid
     */
    private $Bid;

    /**
     * @JMS\Type("integer")
     *
     * @var int $ContextBid
     */
    private $ContextBid;

    /**
     * @JMS\Type("string")
     *
     * @var string $StrategyPriority
     */
    private $StrategyPriority;

    /**
     * @JMS\Type("array<integer>")
     *
     * @var int[] $CompetitorsBids
     */
    private $CompetitorsBids;

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Bids\SearchPrices>")
     *
     * @var SearchPrices[] $SearchPrices
     */
    private $SearchPrices;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Bids\ContextCoverage")
     *
     * @var ContextCoverage $ContextCoverage
     */
    private $ContextCoverage;

    /**
     * @JMS\Type("integer")
     *
     * @var int $MinSearchPrice
     */
    private $MinSearchPrice;

    /**
     * @JMS\Type("integer")
     *
     * @var int $CurrentSearchPrice
     */
    private $CurrentSearchPrice;

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Bids\AuctionBidItem>")
     *
     * @var AuctionBidItem[] $AuctionBids
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
     * @return \eLama\DirectApiV5\Dto\Bids\BidGetItem
     */
    public function setBid($Bid = null)
    {
      $this->Bid = $Bid;
      return $this;
    }

    /**
     * @return int
     */
    public function getContextBid()
    {
      return $this->ContextBid;
    }

    /**
     * @param int $ContextBid
     * @return \eLama\DirectApiV5\Dto\Bids\BidGetItem
     */
    public function setContextBid($ContextBid = null)
    {
      $this->ContextBid = $ContextBid;
      return $this;
    }

    /**
     * @return string
     */
    public function getStrategyPriority()
    {
      return $this->StrategyPriority;
    }

    /**
     * @param string $StrategyPriority
     * @return \eLama\DirectApiV5\Dto\Bids\BidGetItem
     */
    public function setStrategyPriority($StrategyPriority = null)
    {
      $this->StrategyPriority = $StrategyPriority;
      return $this;
    }

    /**
     * @return int[]
     */
    public function getCompetitorsBids()
    {
      return $this->CompetitorsBids;
    }

    /**
     * @param int[] $CompetitorsBids
     * @return \eLama\DirectApiV5\Dto\Bids\BidGetItem
     */
    public function setCompetitorsBids(array $CompetitorsBids = null)
    {
      $this->CompetitorsBids = $CompetitorsBids;
      return $this;
    }

    /**
     * @return SearchPrices[]
     */
    public function getSearchPrices()
    {
      return $this->SearchPrices;
    }

    /**
     * @param SearchPrices[] $SearchPrices
     * @return \eLama\DirectApiV5\Dto\Bids\BidGetItem
     */
    public function setSearchPrices(array $SearchPrices = null)
    {
      $this->SearchPrices = $SearchPrices;
      return $this;
    }

    /**
     * @return ContextCoverage
     */
    public function getContextCoverage()
    {
      return $this->ContextCoverage;
    }

    /**
     * @param ContextCoverage $ContextCoverage
     * @return \eLama\DirectApiV5\Dto\Bids\BidGetItem
     */
    public function setContextCoverage(ContextCoverage $ContextCoverage = null)
    {
      $this->ContextCoverage = $ContextCoverage;
      return $this;
    }

    /**
     * @return int
     */
    public function getMinSearchPrice()
    {
      return $this->MinSearchPrice;
    }

    /**
     * @param int $MinSearchPrice
     * @return \eLama\DirectApiV5\Dto\Bids\BidGetItem
     */
    public function setMinSearchPrice($MinSearchPrice = null)
    {
      $this->MinSearchPrice = $MinSearchPrice;
      return $this;
    }

    /**
     * @return int
     */
    public function getCurrentSearchPrice()
    {
      return $this->CurrentSearchPrice;
    }

    /**
     * @param int $CurrentSearchPrice
     * @return \eLama\DirectApiV5\Dto\Bids\BidGetItem
     */
    public function setCurrentSearchPrice($CurrentSearchPrice = null)
    {
      $this->CurrentSearchPrice = $CurrentSearchPrice;
      return $this;
    }

    /**
     * @return AuctionBidItem[]
     */
    public function getAuctionBids()
    {
      return $this->AuctionBids;
    }

    /**
     * @param AuctionBidItem[] $AuctionBids
     * @return \eLama\DirectApiV5\Dto\Bids\BidGetItem
     */
    public function setAuctionBids(array $AuctionBids = null)
    {
      $this->AuctionBids = $AuctionBids;
      return $this;
    }
}
