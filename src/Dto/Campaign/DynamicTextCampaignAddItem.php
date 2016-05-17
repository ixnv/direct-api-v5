<?php


namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\General\ArrayOfInteger;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class DynamicTextCampaignAddItem
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\DynamicTextCampaignStrategyAdd")
     *
     * @var DynamicTextCampaignStrategyAdd $BiddingStrategy
     */
    private $BiddingStrategy;

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Campaign\DynamicTextCampaignSetting>")
     *
     * @var DynamicTextCampaignSetting[] $Settings
     */
    private $Settings;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\General\ArrayOfInteger")
     *
     * @var ArrayOfInteger $CounterIds
     */
    private $CounterIds;

    /**
     * @param DynamicTextCampaignStrategyAdd $BiddingStrategy
     */
    public function __construct(DynamicTextCampaignStrategyAdd $BiddingStrategy = null)
    {
      $this->BiddingStrategy = $BiddingStrategy;
    }

    /**
     * @return DynamicTextCampaignStrategyAdd
     */
    public function getBiddingStrategy()
    {
      return $this->BiddingStrategy;
    }

    /**
     * @param DynamicTextCampaignStrategyAdd $BiddingStrategy
     * @return \eLama\DirectApiV5\Dto\Campaign\DynamicTextCampaignAddItem
     */
    public function setBiddingStrategy(DynamicTextCampaignStrategyAdd $BiddingStrategy)
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
     * @return \eLama\DirectApiV5\Dto\Campaign\DynamicTextCampaignAddItem
     */
    public function setSettings(array $Settings = null)
    {
      $this->Settings = $Settings;
      return $this;
    }

    /**
     * @return ArrayOfInteger
     */
    public function getCounterIds()
    {
      return $this->CounterIds;
    }

    /**
     * @param ArrayOfInteger $CounterIds
     * @return \eLama\DirectApiV5\Dto\Campaign\DynamicTextCampaignAddItem
     */
    public function setCounterIds(ArrayOfInteger $CounterIds = null)
    {
      $this->CounterIds = $CounterIds;
      return $this;
    }

}
