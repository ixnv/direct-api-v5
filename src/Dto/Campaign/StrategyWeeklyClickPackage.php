<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class StrategyWeeklyClickPackage
{

    /**
     * @JMS\Type("integer")
     *
     * @var int $ClicksPerWeek
     */
    private $ClicksPerWeek;

    /**
     * @JMS\Type("integer")
     *
     * @var int $AverageCpc
     */
    private $AverageCpc;

    /**
     * @JMS\Type("integer")
     *
     * @var int $BidCeiling
     */
    private $BidCeiling;

    /**
     * @return int
     */
    public function getClicksPerWeek()
    {
      return $this->ClicksPerWeek;
    }

    /**
     * @param int $ClicksPerWeek
     * @return \eLama\DirectApiV5\Dto\Campaign\StrategyWeeklyClickPackage
     */
    public function setClicksPerWeek($ClicksPerWeek = null)
    {
      $this->ClicksPerWeek = $ClicksPerWeek;
      return $this;
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
     * @return \eLama\DirectApiV5\Dto\Campaign\StrategyWeeklyClickPackage
     */
    public function setAverageCpc($AverageCpc = null)
    {
      $this->AverageCpc = $AverageCpc;
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
     * @return \eLama\DirectApiV5\Dto\Campaign\StrategyWeeklyClickPackage
     */
    public function setBidCeiling($BidCeiling = null)
    {
      $this->BidCeiling = $BidCeiling;
      return $this;
    }

}
