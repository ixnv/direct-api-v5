<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class StrategyMaximumClicksAdd extends StrategyWeeklyBudgetAddBase
{

    /**
     * @param int $WeeklySpendLimit
     */
    public function __construct($WeeklySpendLimit = null)
    {
      parent::__construct($WeeklySpendLimit);
    }

}
