<?php


namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\General\ArrayOfInteger;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class TextCampaignAddItem
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\TextCampaignStrategyAdd")
     *
     * @var TextCampaignStrategyAdd $BiddingStrategy
     */
    private $BiddingStrategy;

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Campaign\TextCampaignSetting>")
     *
     * @var TextCampaignSetting[] $Settings
     */
    private $Settings;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\General\ArrayOfInteger")
     *
     * @var ArrayOfInteger $CounterIds
     */
    private $CounterIds;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\RelevantKeywordsSetting")
     *
     * @var RelevantKeywordsSetting $RelevantKeywords
     */
    private $RelevantKeywords;

    /**
     * @param TextCampaignStrategyAdd $BiddingStrategy
     */
    public function __construct(TextCampaignStrategyAdd $BiddingStrategy = null)
    {
      $this->BiddingStrategy = $BiddingStrategy;
    }

    /**
     * @return TextCampaignStrategyAdd
     */
    public function getBiddingStrategy()
    {
      return $this->BiddingStrategy;
    }

    /**
     * @param TextCampaignStrategyAdd $BiddingStrategy
     * @return \eLama\DirectApiV5\Dto\Campaign\TextCampaignAddItem
     */
    public function setBiddingStrategy(TextCampaignStrategyAdd $BiddingStrategy)
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
     * @return \eLama\DirectApiV5\Dto\Campaign\TextCampaignAddItem
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
     * @return self
     */
    public function setCounterIds(ArrayOfInteger $CounterIds = null)
    {
      $this->CounterIds = $CounterIds;
      return $this;
    }

    /**
     * @return RelevantKeywordsSetting
     */
    public function getRelevantKeywords()
    {
      return $this->RelevantKeywords;
    }

    /**
     * @param RelevantKeywordsSetting $RelevantKeywords
     * @return self
     */
    public function setRelevantKeywords(RelevantKeywordsSetting $RelevantKeywords = null)
    {
      $this->RelevantKeywords = $RelevantKeywords;
      return $this;
    }
}
