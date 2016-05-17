<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class MobileAppCampaignAddItem
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\MobileAppCampaignStrategyAdd")
     *
     * @var MobileAppCampaignStrategyAdd $BiddingStrategy
     */
    private $BiddingStrategy;

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Campaign\MobileAppCampaignSetting>")
     *
     * @var MobileAppCampaignSetting[] $Settings
     */
    private $Settings;

    /**
     * @param MobileAppCampaignStrategyAdd $BiddingStrategy
     */
    public function __construct(MobileAppCampaignStrategyAdd $BiddingStrategy = null)
    {
      $this->BiddingStrategy = $BiddingStrategy;
    }

    /**
     * @return MobileAppCampaignStrategyAdd
     */
    public function getBiddingStrategy()
    {
      return $this->BiddingStrategy;
    }

    /**
     * @param MobileAppCampaignStrategyAdd $BiddingStrategy
     * @return \eLama\DirectApiV5\Dto\Campaign\MobileAppCampaignAddItem
     */
    public function setBiddingStrategy(MobileAppCampaignStrategyAdd $BiddingStrategy)
    {
      $this->BiddingStrategy = $BiddingStrategy;
      return $this;
    }

    /**
     * @return MobileAppCampaignSetting[]
     */
    public function getSettings()
    {
      return $this->Settings;
    }

    /**
     * @param MobileAppCampaignSetting[] $Settings
     * @return \eLama\DirectApiV5\Dto\Campaign\MobileAppCampaignAddItem
     */
    public function setSettings(array $Settings = null)
    {
      $this->Settings = $Settings;
      return $this;
    }

}
