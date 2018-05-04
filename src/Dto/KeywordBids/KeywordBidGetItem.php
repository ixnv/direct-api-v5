<?php

namespace eLama\DirectApiV5\Dto\KeywordBids;

use eLama\DirectApiV5\Dto\KeywordBids\Enum\PriorityEnum;
use eLama\DirectApiV5\Dto\KeywordBids\Enum\ServingStatusEnum;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class KeywordBidGetItem extends KeywordBidBase
{
    /**
     * @JMS\Type("string")
     *
     * @var ServingStatusEnum $ServingStatus
     */
    private $ServingStatus;

    /**
     * @JMS\Type("string")
     *
     * @var PriorityEnum $StrategyPriority
     */
    private $StrategyPriority;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\KeywordBids\Search")
     *
     * @var Search $Search
     */
    private $Search;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\KeywordBids\Network")
     *
     * @var Network $Network
     */
    private $Network;

    /**
     * @return ServingStatusEnum
     */
    public function getServingStatus()
    {
      return $this->ServingStatus;
    }

    /**
     * @param ServingStatusEnum $ServingStatus
     * @return \eLama\DirectApiV5\Dto\KeywordBids\KeywordBidGetItem
     */
    public function setServingStatus($ServingStatus = null)
    {
      $this->ServingStatus = $ServingStatus;

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
     * @return \eLama\DirectApiV5\Dto\KeywordBids\KeywordBidGetItem
     */
    public function setStrategyPriority($StrategyPriority = null)
    {
      $this->StrategyPriority = $StrategyPriority;

      return $this;
    }

    /**
     * @return Search
     */
    public function getSearch()
    {
      return $this->Search;
    }

    /**
     * @param Search $Search
     * @return \eLama\DirectApiV5\Dto\KeywordBids\KeywordBidGetItem
     */
    public function setSearch(Search $Search = null)
    {
      $this->Search = $Search;

      return $this;
    }

    /**
     * @return Network
     */
    public function getNetwork()
    {
      return $this->Network;
    }

    /**
     * @param Network $Network
     * @return \eLama\DirectApiV5\Dto\KeywordBids\KeywordBidGetItem
     */
    public function setNetwork(Network $Network = null)
    {
      $this->Network = $Network;

      return $this;
    }
}
