<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class TextCampaignStrategyAddBase
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\StrategyMaximumClicksAdd")
     *
     * @var StrategyMaximumClicksAdd $WbMaximumClicks
     */
    private $WbMaximumClicks;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\StrategyMaximumConversionRateAdd")
     *
     * @var StrategyMaximumConversionRateAdd $WbMaximumConversionRate
     */
    private $WbMaximumConversionRate;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\StrategyAverageCpcAdd")
     *
     * @var StrategyAverageCpcAdd $AverageCpc
     */
    private $AverageCpc;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\StrategyAverageCpaAdd")
     *
     * @var StrategyAverageCpaAdd $AverageCpa
     */
    private $AverageCpa;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\StrategyWeeklyClickPackageAdd")
     *
     * @var StrategyWeeklyClickPackageAdd $WeeklyClickPackage
     */
    private $WeeklyClickPackage;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\StrategyAverageRoiAdd")
     *
     * @var StrategyAverageRoiAdd $AverageRoi
     */
    private $AverageRoi;

    /**
     * @return StrategyMaximumClicksAdd
     */
    public function getWbMaximumClicks()
    {
      return $this->WbMaximumClicks;
    }

    /**
     * @param StrategyMaximumClicksAdd $WbMaximumClicks
     * @return \eLama\DirectApiV5\Dto\Campaign\TextCampaignStrategyAddBase
     */
    public function setWbMaximumClicks(StrategyMaximumClicksAdd $WbMaximumClicks)
    {
      $this->WbMaximumClicks = $WbMaximumClicks;
      return $this;
    }

    /**
     * @return StrategyMaximumConversionRateAdd
     */
    public function getWbMaximumConversionRate()
    {
      return $this->WbMaximumConversionRate;
    }

    /**
     * @param StrategyMaximumConversionRateAdd $WbMaximumConversionRate
     * @return \eLama\DirectApiV5\Dto\Campaign\TextCampaignStrategyAddBase
     */
    public function setWbMaximumConversionRate(StrategyMaximumConversionRateAdd $WbMaximumConversionRate)
    {
      $this->WbMaximumConversionRate = $WbMaximumConversionRate;
      return $this;
    }

    /**
     * @return StrategyAverageCpcAdd
     */
    public function getAverageCpc()
    {
      return $this->AverageCpc;
    }

    /**
     * @param StrategyAverageCpcAdd $AverageCpc
     * @return \eLama\DirectApiV5\Dto\Campaign\TextCampaignStrategyAddBase
     */
    public function setAverageCpc(StrategyAverageCpcAdd $AverageCpc)
    {
      $this->AverageCpc = $AverageCpc;
      return $this;
    }

    /**
     * @return StrategyAverageCpaAdd
     */
    public function getAverageCpa()
    {
      return $this->AverageCpa;
    }

    /**
     * @param StrategyAverageCpaAdd $AverageCpa
     * @return \eLama\DirectApiV5\Dto\Campaign\TextCampaignStrategyAddBase
     */
    public function setAverageCpa(StrategyAverageCpaAdd $AverageCpa)
    {
      $this->AverageCpa = $AverageCpa;
      return $this;
    }

    /**
     * @return StrategyWeeklyClickPackageAdd
     */
    public function getWeeklyClickPackage()
    {
      return $this->WeeklyClickPackage;
    }

    /**
     * @param StrategyWeeklyClickPackageAdd $WeeklyClickPackage
     * @return \eLama\DirectApiV5\Dto\Campaign\TextCampaignStrategyAddBase
     */
    public function setWeeklyClickPackage(StrategyWeeklyClickPackageAdd $WeeklyClickPackage)
    {
      $this->WeeklyClickPackage = $WeeklyClickPackage;
      return $this;
    }

    /**
     * @return StrategyAverageRoiAdd
     */
    public function getAverageRoi()
    {
      return $this->AverageRoi;
    }

    /**
     * @param StrategyAverageRoiAdd $AverageRoi
     * @return \eLama\DirectApiV5\Dto\Campaign\TextCampaignStrategyAddBase
     */
    public function setAverageRoi(StrategyAverageRoiAdd $AverageRoi)
    {
      $this->AverageRoi = $AverageRoi;
      return $this;
    }

}
