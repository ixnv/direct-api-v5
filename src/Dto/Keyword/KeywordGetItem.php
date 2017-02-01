<?php

namespace eLama\DirectApiV5\Dto\Keyword;

use eLama\DirectApiV5\Dto\General\Enum\PriorityEnum;
use eLama\DirectApiV5\Dto\General\Enum\StateEnum;
use eLama\DirectApiV5\Dto\General\Enum\StatusEnum;
use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class KeywordGetItem
{

    /**
     * @JMS\Type("integer")
     *
     * @var int $Id
     */
    private $Id;

    /**
     * @JMS\Type("string")
     *
     * @var string $Keyword
     */
    private $Keyword;

    /**
     * @JMS\Type("integer")
     *
     * @var int $AdGroupId
     */
    private $AdGroupId;

    /**
     * @JMS\Type("integer")
     *
     * @var int $CampaignId
     */
    private $CampaignId;

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
     * @var PriorityEnum $StrategyPriority
     */
    private $StrategyPriority;

    /**
     * @JMS\Type("string")
     *
     * @var StateEnum $State
     */
    private $State;

    /**
     * @JMS\Type("string")
     *
     * @var StatusEnum $Status
     */
    private $Status;

    /**
     * @JMS\Type("string")
     *
     * @var string $UserParam1
     */
    private $UserParam1;

    /**
     * @JMS\Type("string")
     *
     * @var string $UserParam2
     */
    private $UserParam2;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Keyword\KeywordProductivity")
     *
     * @var KeywordProductivity $Productivity
     */
    private $Productivity;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Keyword\Statistics")
     *
     * @var Statistics $StatisticsSearch
     */
    private $StatisticsSearch;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Keyword\Statistics")
     *
     * @var Statistics $StatisticsNetwork
     */
    private $StatisticsNetwork;

    /**
     * @return int
     */
    public function getId()
    {
      return $this->Id;
    }

    /**
     * @param int $Id
     * @return \eLama\DirectApiV5\Dto\Keyword\KeywordGetItem
     */
    public function setId($Id = null)
    {
      $this->Id = $Id;
      return $this;
    }

    /**
     * @return string
     */
    public function getKeyword()
    {
      return $this->Keyword;
    }

    /**
     * @param string $Keyword
     * @return \eLama\DirectApiV5\Dto\Keyword\KeywordGetItem
     */
    public function setKeyword($Keyword = null)
    {
      $this->Keyword = $Keyword;
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
     * @return \eLama\DirectApiV5\Dto\Keyword\KeywordGetItem
     */
    public function setAdGroupId($AdGroupId = null)
    {
      $this->AdGroupId = $AdGroupId;
      return $this;
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
     * @return \eLama\DirectApiV5\Dto\Keyword\KeywordGetItem
     */
    public function setCampaignId($CampaignId = null)
    {
      $this->CampaignId = $CampaignId;
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
     * @return \eLama\DirectApiV5\Dto\Keyword\KeywordGetItem
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
     * @return \eLama\DirectApiV5\Dto\Keyword\KeywordGetItem
     */
    public function setContextBid($ContextBid = null)
    {
      $this->ContextBid = $ContextBid;
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
     * @return \eLama\DirectApiV5\Dto\Keyword\KeywordGetItem
     */
    public function setStrategyPriority($StrategyPriority = null)
    {
      $this->StrategyPriority = $StrategyPriority;
      return $this;
    }

    /**
     * @return StateEnum
     */
    public function getState()
    {
      return $this->State;
    }

    /**
     * @param StateEnum $State
     * @return \eLama\DirectApiV5\Dto\Keyword\KeywordGetItem
     */
    public function setState($State = null)
    {
      $this->State = $State;
      return $this;
    }

    /**
     * @return StatusEnum
     */
    public function getStatus()
    {
      return $this->Status;
    }

    /**
     * @param StatusEnum $Status
     * @return \eLama\DirectApiV5\Dto\Keyword\KeywordGetItem
     */
    public function setStatus($Status = null)
    {
      $this->Status = $Status;
      return $this;
    }

    /**
     * @return string
     */
    public function getUserParam1()
    {
      return $this->UserParam1;
    }

    /**
     * @param string $UserParam1
     * @return \eLama\DirectApiV5\Dto\Keyword\KeywordGetItem
     */
    public function setUserParam1($UserParam1 = null)
    {
      $this->UserParam1 = $UserParam1;
      return $this;
    }

    /**
     * @return string
     */
    public function getUserParam2()
    {
      return $this->UserParam2;
    }

    /**
     * @param string $UserParam2
     * @return \eLama\DirectApiV5\Dto\Keyword\KeywordGetItem
     */
    public function setUserParam2($UserParam2 = null)
    {
      $this->UserParam2 = $UserParam2;
      return $this;
    }

    /**
     * @return KeywordProductivity
     */
    public function getProductivity()
    {
      return $this->Productivity;
    }

    /**
     * @param KeywordProductivity $Productivity
     * @return \eLama\DirectApiV5\Dto\Keyword\KeywordGetItem
     */
    public function setProductivity(KeywordProductivity $Productivity = null)
    {
      $this->Productivity = $Productivity;
      return $this;
    }

    /**
     * @return Statistics
     */
    public function getStatisticsSearch()
    {
      return $this->StatisticsSearch;
    }

    /**
     * @param Statistics $StatisticsSearch
     * @return \eLama\DirectApiV5\Dto\Keyword\KeywordGetItem
     */
    public function setStatisticsSearch(Statistics $StatisticsSearch = null)
    {
      $this->StatisticsSearch = $StatisticsSearch;
      return $this;
    }

    /**
     * @return Statistics
     */
    public function getStatisticsNetwork()
    {
      return $this->StatisticsNetwork;
    }

    /**
     * @param Statistics $StatisticsNetwork
     * @return \eLama\DirectApiV5\Dto\Keyword\KeywordGetItem
     */
    public function setStatisticsNetwork(Statistics $StatisticsNetwork = null)
    {
      $this->StatisticsNetwork = $StatisticsNetwork;
      return $this;
    }

}
