<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class MobileAppCampaignStrategyBase
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\StrategyMaximumClicks")
     *
     * @var StrategyMaximumClicks $WbMaximumClicks
     */
    private $WbMaximumClicks;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\StrategyMaximumAppInstalls")
     *
     * @var StrategyMaximumAppInstalls $WbMaximumAppInstalls
     */
    private $WbMaximumAppInstalls;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\StrategyAverageCpc")
     *
     * @var StrategyAverageCpc $AverageCpc
     */
    private $AverageCpc;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\StrategyAverageCpi")
     *
     * @var StrategyAverageCpi $AverageCpi
     */
    private $AverageCpi;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\StrategyWeeklyClickPackage")
     *
     * @var StrategyWeeklyClickPackage $WeeklyClickPackage
     */
    private $WeeklyClickPackage;

    /**
     * @return StrategyMaximumClicks
     */
    public function getWbMaximumClicks()
    {
      return $this->WbMaximumClicks;
    }

    /**
     * @param StrategyMaximumClicks $WbMaximumClicks
     * @return \eLama\DirectApiV5\Dto\Campaign\MobileAppCampaignStrategyBase
     */
    public function setWbMaximumClicks(StrategyMaximumClicks $WbMaximumClicks = null)
    {
      $this->WbMaximumClicks = $WbMaximumClicks;
      return $this;
    }

    /**
     * @return StrategyMaximumAppInstalls
     */
    public function getWbMaximumAppInstalls()
    {
      return $this->WbMaximumAppInstalls;
    }

    /**
     * @param StrategyMaximumAppInstalls $WbMaximumAppInstalls
     * @return \eLama\DirectApiV5\Dto\Campaign\MobileAppCampaignStrategyBase
     */
    public function setWbMaximumAppInstalls(StrategyMaximumAppInstalls $WbMaximumAppInstalls = null)
    {
      $this->WbMaximumAppInstalls = $WbMaximumAppInstalls;
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
     * @return \eLama\DirectApiV5\Dto\Campaign\MobileAppCampaignStrategyBase
     */
    public function setAverageCpc(StrategyAverageCpc $AverageCpc = null)
    {
      $this->AverageCpc = $AverageCpc;
      return $this;
    }

    /**
     * @return StrategyAverageCpi
     */
    public function getAverageCpi()
    {
      return $this->AverageCpi;
    }

    /**
     * @param StrategyAverageCpi $AverageCpi
     * @return \eLama\DirectApiV5\Dto\Campaign\MobileAppCampaignStrategyBase
     */
    public function setAverageCpi(StrategyAverageCpi $AverageCpi = null)
    {
      $this->AverageCpi = $AverageCpi;
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
     * @return \eLama\DirectApiV5\Dto\Campaign\MobileAppCampaignStrategyBase
     */
    public function setWeeklyClickPackage(StrategyWeeklyClickPackage $WeeklyClickPackage = null)
    {
      $this->WeeklyClickPackage = $WeeklyClickPackage;
      return $this;
    }

}
