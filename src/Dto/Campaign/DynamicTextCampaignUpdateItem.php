<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class DynamicTextCampaignUpdateItem extends DynamicTextCampaignBase
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\DynamicTextCampaignStrategy")
     *
     * @var DynamicTextCampaignStrategy $BiddingStrategy
     */
    private $BiddingStrategy;

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Campaign\DynamicTextCampaignSetting>")
     *
     * @var DynamicTextCampaignSetting[] $Settings
     */
    private $Settings;

    /**
     * @return DynamicTextCampaignStrategy
     */
    public function getBiddingStrategy()
    {
      return $this->BiddingStrategy;
    }

    /**
     * @param DynamicTextCampaignStrategy $BiddingStrategy
     * @return \eLama\DirectApiV5\Dto\Campaign\DynamicTextCampaignUpdateItem
     */
    public function setBiddingStrategy(DynamicTextCampaignStrategy $BiddingStrategy = null)
    {
      $this->BiddingStrategy = $BiddingStrategy;
      return $this;
    }

    /**
     * @return DynamicTextCampaignSetting[]
     */
    public function getSettings()
    {
      return $this->Settings;
    }

    /**
     * @param DynamicTextCampaignSetting[] $Settings
     * @return \eLama\DirectApiV5\Dto\Campaign\DynamicTextCampaignUpdateItem
     */
    public function setSettings(array $Settings = null)
    {
      $this->Settings = $Settings;
      return $this;
    }

}
