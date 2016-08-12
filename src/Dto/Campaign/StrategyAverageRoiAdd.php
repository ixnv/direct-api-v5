<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class StrategyAverageRoiAdd
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
     * @param int $ReserveReturn
     * @param int $RoiCoef
     * @param int $GoalId
     */
    public function __construct($ReserveReturn, $RoiCoef, $GoalId)
    {
      $this->ReserveReturn = $ReserveReturn;
      $this->RoiCoef = $RoiCoef;
      $this->GoalId = $GoalId;
    }

    /**
     * @return int
     */
    public function getReserveReturn()
    {
      return $this->ReserveReturn;
    }

    /**
     * @param int $ReserveReturn
     * @return \eLama\DirectApiV5\Dto\Campaign\StrategyAverageRoiAdd
     */
    public function setReserveReturn($ReserveReturn)
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
     * @return \eLama\DirectApiV5\Dto\Campaign\StrategyAverageRoiAdd
     */
    public function setRoiCoef($RoiCoef)
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
     * @return \eLama\DirectApiV5\Dto\Campaign\StrategyAverageRoiAdd
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
     * @return \eLama\DirectApiV5\Dto\Campaign\StrategyAverageRoiAdd
     */
    public function setWeeklySpendLimit($WeeklySpendLimit)
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
     * @return \eLama\DirectApiV5\Dto\Campaign\StrategyAverageRoiAdd
     */
    public function setBidCeiling($BidCeiling)
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
     * @return \eLama\DirectApiV5\Dto\Campaign\StrategyAverageRoiAdd
     */
    public function setProfitability($Profitability)
    {
      $this->Profitability = $Profitability;
      return $this;
    }

}
