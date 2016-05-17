<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class MobileAppCampaignUpdateItem
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\MobileAppCampaignStrategy")
     *
     * @var MobileAppCampaignStrategy $BiddingStrategy
     */
    private $BiddingStrategy;

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Campaign\MobileAppCampaignSetting>")
     *
     * @var MobileAppCampaignSetting[] $Settings
     */
    private $Settings;

    /**
     * @return MobileAppCampaignStrategy
     */
    public function getBiddingStrategy()
    {
      return $this->BiddingStrategy;
    }

    /**
     * @param MobileAppCampaignStrategy $BiddingStrategy
     * @return \eLama\DirectApiV5\Dto\Campaign\MobileAppCampaignUpdateItem
     */
    public function setBiddingStrategy(MobileAppCampaignStrategy $BiddingStrategy = null)
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
     * @return \eLama\DirectApiV5\Dto\Campaign\MobileAppCampaignUpdateItem
     */
    public function setSettings(array $Settings = null)
    {
      $this->Settings = $Settings;
      return $this;
    }

}
