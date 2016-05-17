<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class TextCampaignNetworkStrategyAdd extends TextCampaignStrategyAddBase
{

    /**
     * @JMS\Type("string")
     *
     * @var TextCampaignNetworkStrategyTypeEnum $BiddingStrategyType
     */
    private $BiddingStrategyType;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\StrategyNetworkDefaultAdd")
     *
     * @var StrategyNetworkDefaultAdd $NetworkDefault
     */
    private $NetworkDefault;

    /**
     * @param TextCampaignNetworkStrategyTypeEnum $BiddingStrategyType
     */
    public function __construct($BiddingStrategyType = null)
    {
      parent::__construct();
      $this->BiddingStrategyType = $BiddingStrategyType;
    }

    /**
     * @return TextCampaignNetworkStrategyTypeEnum
     */
    public function getBiddingStrategyType()
    {
      return $this->BiddingStrategyType;
    }

    /**
     * @param TextCampaignNetworkStrategyTypeEnum $BiddingStrategyType
     * @return \eLama\DirectApiV5\Dto\Campaign\TextCampaignNetworkStrategyAdd
     */
    public function setBiddingStrategyType($BiddingStrategyType)
    {
      $this->BiddingStrategyType = $BiddingStrategyType;
      return $this;
    }

    /**
     * @return StrategyNetworkDefaultAdd
     */
    public function getNetworkDefault()
    {
      return $this->NetworkDefault;
    }

    /**
     * @param StrategyNetworkDefaultAdd $NetworkDefault
     * @return \eLama\DirectApiV5\Dto\Campaign\TextCampaignNetworkStrategyAdd
     */
    public function setNetworkDefault(StrategyNetworkDefaultAdd $NetworkDefault = null)
    {
      $this->NetworkDefault = $NetworkDefault;
      return $this;
    }

}
