<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class StrategyAverageCpaAdd
{

    /**
     * @JMS\Type("integer")
     *
     * @var int $AverageCpa
     */
    private $AverageCpa;

    /**
     * @JMS\Type("integer")
     *
     * @var int $GoalId
     */
    private $GoalId;

    /**
     * @JMS\Type("integer")
     *
     * @var int $WeeklySpendLimit
     */
    private $WeeklySpendLimit;

    /**
     * @JMS\Type("integer")
     *
     * @var int $BidCeiling
     */
    private $BidCeiling;

    /**
     * @param int $AverageCpa
     * @param int $GoalId
     */
    public function __construct($AverageCpa = null, $GoalId = null)
    {
      $this->AverageCpa = $AverageCpa;
      $this->GoalId = $GoalId;
    }

    /**
     * @return int
     */
    public function getAverageCpa()
    {
      return $this->AverageCpa;
    }

    /**
     * @param int $AverageCpa
     * @return \eLama\DirectApiV5\Dto\Campaign\StrategyAverageCpaAdd
     */
    public function setAverageCpa($AverageCpa)
    {
      $this->AverageCpa = $AverageCpa;
      return $this;
    }

    /**
     * @return int
     */
    public function getGoalId()
    {
      return $this->GoalId;
    }

    /**
     * @param int $GoalId
     * @return \eLama\DirectApiV5\Dto\Campaign\StrategyAverageCpaAdd
     */
    public function setGoalId($GoalId)
    {
      $this->GoalId = $GoalId;
      return $this;
    }

    /**
     * @return int
     */
    public function getWeeklySpendLimit()
    {
      return $this->WeeklySpendLimit;
    }

    /**
     * @param int $WeeklySpendLimit
     * @return \eLama\DirectApiV5\Dto\Campaign\StrategyAverageCpaAdd
     */
    public function setWeeklySpendLimit($WeeklySpendLimit = null)
    {
      $this->WeeklySpendLimit = $WeeklySpendLimit;
      return $this;
    }

    /**
     * @return int
     */
    public function getBidCeiling()
    {
      return $this->BidCeiling;
    }

    /**
     * @param int $BidCeiling
     * @return \eLama\DirectApiV5\Dto\Campaign\StrategyAverageCpaAdd
     */
    public function setBidCeiling($BidCeiling = null)
    {
      $this->BidCeiling = $BidCeiling;
      return $this;
    }

}
