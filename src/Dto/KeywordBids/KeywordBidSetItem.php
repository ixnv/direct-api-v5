<?php

namespace eLama\DirectApiV5\Dto\KeywordBids;

use eLama\DirectApiV5\Dto\KeywordBids\Enum\PriorityEnum;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class KeywordBidSetItem
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
     * @var int $SearchBid
     */
    private $SearchBid;

    /**
     * @JMS\Type("integer")
     *
     * @var int $NetworkBid
     */
    private $NetworkBid;

    /**
     * @JMS\Type("string")
     *
     * @var PriorityEnum $StrategyPriority
     */
    private $StrategyPriority;

    /**
     * @return int
     */
    public function getCampaignId()
    {
      return $this->CampaignId;
    }

    /**
     * @param int $CampaignId
     * @return \eLama\DirectApiV5\Dto\KeywordBids\KeywordBidSetItem
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
     * @return \eLama\DirectApiV5\Dto\KeywordBids\KeywordBidSetItem
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
     * @return \eLama\DirectApiV5\Dto\KeywordBids\KeywordBidSetItem
     */
    public function setKeywordId($KeywordId = null)
    {
      $this->KeywordId = $KeywordId;

      return $this;
    }

    /**
     * @return int
     */
    public function getSearchBid()
    {
      return $this->SearchBid;
    }

    /**
     * @param int $SearchBid
     * @return \eLama\DirectApiV5\Dto\KeywordBids\KeywordBidSetItem
     */
    public function setSearchBid($SearchBid = null)
    {
      $this->SearchBid = $SearchBid;

      return $this;
    }

    /**
     * @return int
     */
    public function getNetworkBid()
    {
      return $this->NetworkBid;
    }

    /**
     * @param int $NetworkBid
     * @return \eLama\DirectApiV5\Dto\KeywordBids\KeywordBidSetItem
     */
    public function setNetworkBid($NetworkBid = null)
    {
      $this->NetworkBid = $NetworkBid;

      return $this;
    }

    /**
     * @return PriorityEnum
     */
    public function getStrategyPriority()
    {
      return $this->StrategyPriority;
    }

    /**
     * @param PriorityEnum $StrategyPriority
     * @return \eLama\DirectApiV5\Dto\KeywordBids\KeywordBidSetItem
     */
    public function setStrategyPriority($StrategyPriority = null)
    {
      $this->StrategyPriority = $StrategyPriority;

      return $this;
    }
}
