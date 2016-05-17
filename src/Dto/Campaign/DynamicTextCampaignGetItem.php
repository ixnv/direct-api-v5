<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class DynamicTextCampaignGetItem extends DynamicTextCampaignBase
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\DynamicTextCampaignStrategy")
     *
     * @var DynamicTextCampaignStrategy $BiddingStrategy
     */
    private $BiddingStrategy;

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Campaign\DynamicTextCampaignSettingGet>")
     *
     * @var DynamicTextCampaignSettingGet[] $Settings
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
     * @return \eLama\DirectApiV5\Dto\Campaign\DynamicTextCampaignGetItem
     */
    public function setBiddingStrategy(DynamicTextCampaignStrategy $BiddingStrategy = null)
    {
      $this->BiddingStrategy = $BiddingStrategy;
      return $this;
    }

    /**
     * @return DynamicTextCampaignSettingGet[]
     */
    public function getSettings()
    {
      return $this->Settings;
    }

    /**
     * @param DynamicTextCampaignSettingGet[] $Settings
     * @return \eLama\DirectApiV5\Dto\Campaign\DynamicTextCampaignGetItem
     */
    public function setSettings(array $Settings = null)
    {
      $this->Settings = $Settings;
      return $this;
    }

}
