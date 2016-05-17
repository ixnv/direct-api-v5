<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class StrategyAverageRoi
{

    /**
     * @JMS\Type("integer")
     *
     * @var int $ReserveReturn
     */
    private $ReserveReturn;

    /**
     * @JMS\Type("integer")
     *
     * @var int $RoiCoef
     */
    private $RoiCoef;

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
     * @JMS\Type("integer")
     *
     * @var int $Profitability
     */
    private $Profitability;

    /**
     * @return int
     */
    public function getReserveReturn()
    {
      return $this->ReserveReturn;
    }

    /**
     * @param int $ReserveReturn
     * @return \eLama\DirectApiV5\Dto\Campaign\StrategyAverageRoi
     */
    public function setReserveReturn($ReserveReturn = null)
    {
      $this->ReserveReturn = $ReserveReturn;
      return $this;
    }

    /**
     * @return int
     */
    public function getRoiCoef()
    {
      return $this->RoiCoef;
    }

    /**
     * @param int $RoiCoef
     * @return \eLama\DirectApiV5\Dto\Campaign\StrategyAverageRoi
     */
    public function setRoiCoef($RoiCoef = null)
    {
      $this->RoiCoef = $RoiCoef;
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
     * @return \eLama\DirectApiV5\Dto\Campaign\StrategyAverageRoi
     */
    public function setGoalId($GoalId = null)
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
     * @return \eLama\DirectApiV5\Dto\Campaign\StrategyAverageRoi
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
     * @return \eLama\DirectApiV5\Dto\Campaign\StrategyAverageRoi
     */
    public function setBidCeiling($BidCeiling = null)
    {
      $this->BidCeiling = $BidCeiling;
      return $this;
    }

    /**
     * @return int
     */
    public function getProfitability()
    {
      return $this->Profitability;
    }

    /**
     * @param int $Profitability
     * @return \eLama\DirectApiV5\Dto\Campaign\StrategyAverageRoi
     */
    public function setProfitability($Profitability = null)
    {
      $this->Profitability = $Profitability;
      return $this;
    }

}
