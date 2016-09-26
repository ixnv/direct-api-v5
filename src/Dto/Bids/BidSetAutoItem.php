<?php

namespace eLama\DirectApiV5\Dto\Bids;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class BidSetAutoItem
{
    /**
     * @JMS\Type("integer")
     *
     * @var int $CampaignId
     */
    private $CampaignId;

    /**
     * @JMS\Type("integer")
     *
     * @var int $AdGroupId
     */
    private $AdGroupId;

    /**
     * @JMS\Type("integer")
     *
     * @var int $KeywordId
     */
    private $KeywordId;

    /**
     * @JMS\Type("integer")
     *
     * @var int $MaxBid
     */
    private $MaxBid;

    /**
     * @JMS\Type("string")
     *
     * @var string $Position
     */
    private $Position;

    /**
     * @JMS\Type("integer")
     *
     * @var int $IncreasePercent
     */
    private $IncreasePercent;

    /**
     * @JMS\Type("string")
     *
     * @var string $CalculateBy
     */
    private $CalculateBy;

    /**
     * @JMS\Type("integer")
     *
     * @var int $ContextCoverage
     */
    private $ContextCoverage;

    /**
     * @JMS\Type("array<string>")
     *
     * @var string[] $Scope
     */
    private $Scope;

    /**
     * @param string[] $Scope
     */
    public function __construct(array $Scope = null)
    {
      $this->Scope = $Scope;
    }

    /**
     * @return int
     */
    public function getCampaignId()
    {
      return $this->CampaignId;
    }

    /**
     * @param int $CampaignId
     * @return \eLama\DirectApiV5\Dto\Bids\BidSetAutoItem
     */
    public function setCampaignId($CampaignId = null)
    {
      $this->CampaignId = $CampaignId;
      return $this;
    }

    /**
     * @return int
     */
    public function getAdGroupId()
    {
      return $this->AdGroupId;
    }

    /**
     * @param int $AdGroupId
     * @return \eLama\DirectApiV5\Dto\Bids\BidSetAutoItem
     */
    public function setAdGroupId($AdGroupId = null)
    {
      $this->AdGroupId = $AdGroupId;
      return $this;
    }

    /**
     * @return int
     */
    public function getKeywordId()
    {
      return $this->KeywordId;
    }

    /**
     * @param int $KeywordId
     * @return \eLama\DirectApiV5\Dto\Bids\BidSetAutoItem
     */
    public function setKeywordId($KeywordId = null)
    {
      $this->KeywordId = $KeywordId;
      return $this;
    }

    /**
     * @return int
     */
    public function getMaxBid()
    {
      return $this->MaxBid;
    }

    /**
     * @param int $MaxBid
     * @return \eLama\DirectApiV5\Dto\Bids\BidSetAutoItem
     */
    public function setMaxBid($MaxBid = null)
    {
      $this->MaxBid = $MaxBid;
      return $this;
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
     * @return \eLama\DirectApiV5\Dto\Bids\BidSetAutoItem
     */
    public function setPosition($Position = null)
    {
      $this->Position = $Position;
      return $this;
    }

    /**
     * @return int
     */
    public function getIncreasePercent()
    {
      return $this->IncreasePercent;
    }

    /**
     * @param int $IncreasePercent
     * @return \eLama\DirectApiV5\Dto\Bids\BidSetAutoItem
     */
    public function setIncreasePercent($IncreasePercent = null)
    {
      $this->IncreasePercent = $IncreasePercent;
      return $this;
    }

    /**
     * @return string
     */
    public function getCalculateBy()
    {
      return $this->CalculateBy;
    }

    /**
     * @param string $CalculateBy
     * @return \eLama\DirectApiV5\Dto\Bids\BidSetAutoItem
     */
    public function setCalculateBy($CalculateBy = null)
    {
      $this->CalculateBy = $CalculateBy;
      return $this;
    }

    /**
     * @return int
     */
    public function getContextCoverage()
    {
      return $this->ContextCoverage;
    }

    /**
     * @param int $ContextCoverage
     * @return \eLama\DirectApiV5\Dto\Bids\BidSetAutoItem
     */
    public function setContextCoverage($ContextCoverage = null)
    {
      $this->ContextCoverage = $ContextCoverage;
      return $this;
    }

    /**
     * @return string[]
     */
    public function getScope()
    {
      return $this->Scope;
    }

    /**
     * @param string[] $Scope
     * @return \eLama\DirectApiV5\Dto\Bids\BidSetAutoItem
     */
    public function setScope(array $Scope)
    {
      $this->Scope = $Scope;
      return $this;
    }
}
