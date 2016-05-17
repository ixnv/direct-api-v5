<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class StrategyAverageCpc
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
     * @return int
     */
    public function getAverageCpc()
    {
      return $this->AverageCpc;
    }

    /**
     * @param int $AverageCpc
     * @return \eLama\DirectApiV5\Dto\Campaign\StrategyAverageCpc
     */
    public function setAverageCpc($AverageCpc = null)
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
     * @return \eLama\DirectApiV5\Dto\Campaign\StrategyAverageCpc
     */
    public function setWeeklySpendLimit($WeeklySpendLimit = null)
    {
      $this->WeeklySpendLimit = $WeeklySpendLimit;
      return $this;
    }

}
