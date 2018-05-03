<?php

namespace eLama\DirectApiV5\Dto\Keywordbids;

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
     * @JMS\Type("eLama\DirectApiV5\Dto\Keywordbids\Search")
     *
     * @var Search $Search
     */
    private $Search;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Keywordbids\Network")
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
     * @return \eLama\DirectApiV5\Dto\Keywordbids\KeywordBidGetItem
     */
    public function setServingStatus(string $ServingStatus = null)
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
     * @return \eLama\DirectApiV5\Dto\Keywordbids\KeywordBidGetItem
     */
    public function setStrategyPriority(string $StrategyPriority = null)
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
     * @return \eLama\DirectApiV5\Dto\Keywordbids\KeywordBidGetItem
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
     * @return \eLama\DirectApiV5\Dto\Keywordbids\KeywordBidGetItem
     */
    public function setNetwork(Network $Network = null)
    {
      $this->Network = $Network;
      return $this;
    }

}
