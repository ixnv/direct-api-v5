<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class StrategyAverageCpiAdd
{

    /**
     * @JMS\Type("integer")
     *
     * @var int $AverageCpi
     */
    private $AverageCpi;

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
     * @param int $AverageCpi
     */
    public function __construct($AverageCpi = null)
    {
      $this->AverageCpi = $AverageCpi;
    }

    /**
     * @return int
     */
    public function getAverageCpi()
    {
      return $this->AverageCpi;
    }

    /**
     * @param int $AverageCpi
     * @return \eLama\DirectApiV5\Dto\Campaign\StrategyAverageCpiAdd
     */
    public function setAverageCpi($AverageCpi)
    {
      $this->AverageCpi = $AverageCpi;
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
     * @return \eLama\DirectApiV5\Dto\Campaign\StrategyAverageCpiAdd
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
     * @return \eLama\DirectApiV5\Dto\Campaign\StrategyAverageCpiAdd
     */
    public function setBidCeiling($BidCeiling = null)
    {
      $this->BidCeiling = $BidCeiling;
      return $this;
    }

}
