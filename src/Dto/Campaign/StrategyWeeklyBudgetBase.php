<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class StrategyWeeklyBudgetBase
{

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
     * @return int
     */
    public function getWeeklySpendLimit()
    {
      return $this->WeeklySpendLimit;
    }

    /**
     * @param int $WeeklySpendLimit
     * @return \eLama\DirectApiV5\Dto\Campaign\StrategyWeeklyBudgetBase
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
     * @return \eLama\DirectApiV5\Dto\Campaign\StrategyWeeklyBudgetBase
     */
    public function setBidCeiling($BidCeiling = null)
    {
      $this->BidCeiling = $BidCeiling;
      return $this;
    }

}
