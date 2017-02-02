<?php

namespace eLama\DirectApiV5\Dto\Keyword;

use eLama\DirectApiV5\Dto\General\Enum\PriorityEnum;
use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class KeywordAddItem
{

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
     * @param string $Keyword
     * @param int $AdGroupId
     */
    public function __construct($Keyword, $AdGroupId)
    {
      $this->Keyword = $Keyword;
      $this->AdGroupId = $AdGroupId;
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
     * @return \eLama\DirectApiV5\Dto\Keyword\KeywordAddItem
     */
    public function setKeyword($Keyword)
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
     * @return \eLama\DirectApiV5\Dto\Keyword\KeywordAddItem
     */
    public function setAdGroupId($AdGroupId)
    {
      $this->AdGroupId = $AdGroupId;
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
     * @return \eLama\DirectApiV5\Dto\Keyword\KeywordAddItem
     */
    public function setBid($Bid)
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
     * @return \eLama\DirectApiV5\Dto\Keyword\KeywordAddItem
     */
    public function setContextBid($ContextBid)
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
     * @return \eLama\DirectApiV5\Dto\Keyword\KeywordAddItem
     */
    public function setStrategyPriority($StrategyPriority)
    {
      $this->StrategyPriority = $StrategyPriority;
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
     * @return \eLama\DirectApiV5\Dto\Keyword\KeywordAddItem
     */
    public function setUserParam1($UserParam1)
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
     * @return \eLama\DirectApiV5\Dto\Keyword\KeywordAddItem
     */
    public function setUserParam2($UserParam2)
    {
      $this->UserParam2 = $UserParam2;
      return $this;
    }

}
