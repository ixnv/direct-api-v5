<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class StrategyMaximumConversionRateAdd extends StrategyWeeklyBudgetAddBase
{

    /**
     * @JMS\Type("integer")
     *
     * @var int $GoalId
     */
    private $GoalId;

    /**
     * @param int $WeeklySpendLimit
     * @param int $GoalId
     */
    public function __construct($WeeklySpendLimit = null, $GoalId = null)
    {
      parent::__construct($WeeklySpendLimit);
      $this->GoalId = $GoalId;
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
     * @return \eLama\DirectApiV5\Dto\Campaign\StrategyMaximumConversionRateAdd
     */
    public function setGoalId($GoalId)
    {
      $this->GoalId = $GoalId;
      return $this;
    }

}
