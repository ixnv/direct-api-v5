<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class TextCampaignStrategyBase
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\StrategyMaximumClicks")
     *
     * @var StrategyMaximumClicks $WbMaximumClicks
     */
    private $WbMaximumClicks;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\StrategyMaximumConversionRate")
     *
     * @var StrategyMaximumConversionRate $WbMaximumConversionRate
     */
    private $WbMaximumConversionRate;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\StrategyAverageCpc")
     *
     * @var StrategyAverageCpc $AverageCpc
     */
    private $AverageCpc;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\StrategyAverageCpa")
     *
     * @var StrategyAverageCpa $AverageCpa
     */
    private $AverageCpa;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\StrategyWeeklyClickPackage")
     *
     * @var StrategyWeeklyClickPackage $WeeklyClickPackage
     */
    private $WeeklyClickPackage;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\StrategyAverageRoi")
     *
     * @var StrategyAverageRoi $AverageRoi
     */
    private $AverageRoi;

    /**
     * @return StrategyMaximumClicks
     */
    public function getWbMaximumClicks()
    {
      return $this->WbMaximumClicks;
    }

    /**
     * @param StrategyMaximumClicks $WbMaximumClicks
     * @return \eLama\DirectApiV5\Dto\Campaign\TextCampaignStrategyBase
     */
    public function setWbMaximumClicks(StrategyMaximumClicks $WbMaximumClicks = null)
    {
      $this->WbMaximumClicks = $WbMaximumClicks;
      return $this;
    }

    /**
     * @return StrategyMaximumConversionRate
     */
    public function getWbMaximumConversionRate()
    {
      return $this->WbMaximumConversionRate;
    }

    /**
     * @param StrategyMaximumConversionRate $WbMaximumConversionRate
     * @return \eLama\DirectApiV5\Dto\Campaign\TextCampaignStrategyBase
     */
    public function setWbMaximumConversionRate(StrategyMaximumConversionRate $WbMaximumConversionRate = null)
    {
      $this->WbMaximumConversionRate = $WbMaximumConversionRate;
      return $this;
    }

    /**
     * @return StrategyAverageCpc
     */
    public function getAverageCpc()
    {
      return $this->AverageCpc;
    }

    /**
     * @param StrategyAverageCpc $AverageCpc
     * @return \eLama\DirectApiV5\Dto\Campaign\TextCampaignStrategyBase
     */
    public function setAverageCpc(StrategyAverageCpc $AverageCpc = null)
    {
      $this->AverageCpc = $AverageCpc;
      return $this;
    }

    /**
     * @return StrategyAverageCpa
     */
    public function getAverageCpa()
    {
      return $this->AverageCpa;
    }

    /**
     * @param StrategyAverageCpa $AverageCpa
     * @return \eLama\DirectApiV5\Dto\Campaign\TextCampaignStrategyBase
     */
    public function setAverageCpa(StrategyAverageCpa $AverageCpa = null)
    {
      $this->AverageCpa = $AverageCpa;
      return $this;
    }

    /**
     * @return StrategyWeeklyClickPackage
     */
    public function getWeeklyClickPackage()
    {
      return $this->WeeklyClickPackage;
    }

    /**
     * @param StrategyWeeklyClickPackage $WeeklyClickPackage
     * @return \eLama\DirectApiV5\Dto\Campaign\TextCampaignStrategyBase
     */
    public function setWeeklyClickPackage(StrategyWeeklyClickPackage $WeeklyClickPackage = null)
    {
      $this->WeeklyClickPackage = $WeeklyClickPackage;
      return $this;
    }

    /**
     * @return StrategyAverageRoi
     */
    public function getAverageRoi()
    {
      return $this->AverageRoi;
    }

    /**
     * @param StrategyAverageRoi $AverageRoi
     * @return \eLama\DirectApiV5\Dto\Campaign\TextCampaignStrategyBase
     */
    public function setAverageRoi(StrategyAverageRoi $AverageRoi = null)
    {
      $this->AverageRoi = $AverageRoi;
      return $this;
    }

}
