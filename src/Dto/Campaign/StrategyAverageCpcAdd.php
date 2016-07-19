<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class StrategyAverageCpcAdd
{

    /**
     * @JMS\Type("integer")
     *
     * @var int $AverageCpc
     */
    private $AverageCpc;

    /**
     * @JMS\Type("integer")
     *
     * @var int $WeeklySpendLimit
     */
    private $WeeklySpendLimit;

    /**
     * @param int $AverageCpc
     * @param int $weeklySpendLimit
     */
    public function __construct($AverageCpc, $weeklySpendLimit = null)
    {
      $this->AverageCpc = $AverageCpc;
      $this->WeeklySpendLimit = $weeklySpendLimit;
    }

    /**
     * @return int
     */
    public function getAverageCpc()
    {
      return $this->AverageCpc;
    }

    /**
     * @param int $AverageCpc
     * @return \eLama\DirectApiV5\Dto\Campaign\StrategyAverageCpcAdd
     */
    public function setAverageCpc($AverageCpc)
    {
      $this->AverageCpc = $AverageCpc;
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
     * @return \eLama\DirectApiV5\Dto\Campaign\StrategyAverageCpcAdd
     */
    public function setWeeklySpendLimit($WeeklySpendLimit)
    {
      $this->WeeklySpendLimit = $WeeklySpendLimit;
      return $this;
    }

}
