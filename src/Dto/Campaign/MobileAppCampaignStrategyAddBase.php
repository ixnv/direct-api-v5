<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class MobileAppCampaignStrategyAddBase
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\StrategyMaximumClicksAdd")
     *
     * @var StrategyMaximumClicksAdd $WbMaximumClicks
     */
    private $WbMaximumClicks;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\StrategyMaximumAppInstallsAdd")
     *
     * @var StrategyMaximumAppInstallsAdd $WbMaximumAppInstalls
     */
    private $WbMaximumAppInstalls;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\StrategyAverageCpcAdd")
     *
     * @var StrategyAverageCpcAdd $AverageCpc
     */
    private $AverageCpc;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\StrategyAverageCpiAdd")
     *
     * @var StrategyAverageCpiAdd $AverageCpi
     */
    private $AverageCpi;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\StrategyWeeklyClickPackageAdd")
     *
     * @var StrategyWeeklyClickPackageAdd $WeeklyClickPackage
     */
    private $WeeklyClickPackage;

    /**
     * @return StrategyMaximumClicksAdd
     */
    public function getWbMaximumClicks()
    {
      return $this->WbMaximumClicks;
    }

    /**
     * @param StrategyMaximumClicksAdd $WbMaximumClicks
     * @return \eLama\DirectApiV5\Dto\Campaign\MobileAppCampaignStrategyAddBase
     */
    public function setWbMaximumClicks(StrategyMaximumClicksAdd $WbMaximumClicks = null)
    {
      $this->WbMaximumClicks = $WbMaximumClicks;
      return $this;
    }

    /**
     * @return StrategyMaximumAppInstallsAdd
     */
    public function getWbMaximumAppInstalls()
    {
      return $this->WbMaximumAppInstalls;
    }

    /**
     * @param StrategyMaximumAppInstallsAdd $WbMaximumAppInstalls
     * @return \eLama\DirectApiV5\Dto\Campaign\MobileAppCampaignStrategyAddBase
     */
    public function setWbMaximumAppInstalls(StrategyMaximumAppInstallsAdd $WbMaximumAppInstalls = null)
    {
      $this->WbMaximumAppInstalls = $WbMaximumAppInstalls;
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
     * @return \eLama\DirectApiV5\Dto\Campaign\MobileAppCampaignStrategyAddBase
     */
    public function setAverageCpc(StrategyAverageCpcAdd $AverageCpc = null)
    {
      $this->AverageCpc = $AverageCpc;
      return $this;
    }

    /**
     * @return StrategyAverageCpiAdd
     */
    public function getAverageCpi()
    {
      return $this->AverageCpi;
    }

    /**
     * @param StrategyAverageCpiAdd $AverageCpi
     * @return \eLama\DirectApiV5\Dto\Campaign\MobileAppCampaignStrategyAddBase
     */
    public function setAverageCpi(StrategyAverageCpiAdd $AverageCpi = null)
    {
      $this->AverageCpi = $AverageCpi;
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
     * @return \eLama\DirectApiV5\Dto\Campaign\MobileAppCampaignStrategyAddBase
     */
    public function setWeeklyClickPackage(StrategyWeeklyClickPackageAdd $WeeklyClickPackage = null)
    {
      $this->WeeklyClickPackage = $WeeklyClickPackage;
      return $this;
    }

}
