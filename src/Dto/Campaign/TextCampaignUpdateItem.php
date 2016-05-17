<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class TextCampaignUpdateItem extends TextCampaignBase
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\TextCampaignStrategy")
     *
     * @var TextCampaignStrategy $BiddingStrategy
     */
    private $BiddingStrategy;

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Campaign\TextCampaignSetting>")
     *
     * @var TextCampaignSetting[] $Settings
     */
    private $Settings;

    /**
     * @return TextCampaignStrategy
     */
    public function getBiddingStrategy()
    {
      return $this->BiddingStrategy;
    }

    /**
     * @param TextCampaignStrategy $BiddingStrategy
     * @return \eLama\DirectApiV5\Dto\Campaign\TextCampaignUpdateItem
     */
    public function setBiddingStrategy(TextCampaignStrategy $BiddingStrategy = null)
    {
      $this->BiddingStrategy = $BiddingStrategy;
      return $this;
    }

    /**
     * @return TextCampaignSetting[]
     */
    public function getSettings()
    {
      return $this->Settings;
    }

    /**
     * @param TextCampaignSetting[] $Settings
     * @return \eLama\DirectApiV5\Dto\Campaign\TextCampaignUpdateItem
     */
    public function setSettings(array $Settings = null)
    {
      $this->Settings = $Settings;
      return $this;
    }

}
