<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class TextCampaignNetworkStrategy extends TextCampaignStrategyBase
{

    /**
     * @JMS\Type("string")
     *
     * @var TextCampaignNetworkStrategyTypeEnum $BiddingStrategyType
     */
    private $BiddingStrategyType;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\StrategyNetworkDefault")
     *
     * @var StrategyNetworkDefault $NetworkDefault
     */
    private $NetworkDefault;

    /**
     * @param TextCampaignNetworkStrategyTypeEnum $BiddingStrategyType
     */
    public function __construct($BiddingStrategyType = null)
    {
      $this->BiddingStrategyType = $BiddingStrategyType;
    }

    /**
     * @see TextCampaignNetworkStrategyTypeEnum
     * @return string
     */
    public function getBiddingStrategyType()
    {
      return $this->BiddingStrategyType;
    }

    /**
     * @param TextCampaignNetworkStrategyTypeEnum $BiddingStrategyType
     * @return \eLama\DirectApiV5\Dto\Campaign\TextCampaignNetworkStrategy
     */
    public function setBiddingStrategyType($BiddingStrategyType)
    {
      $this->BiddingStrategyType = $BiddingStrategyType;
      return $this;
    }

    /**
     * @return StrategyNetworkDefault
     */
    public function getNetworkDefault()
    {
      return $this->NetworkDefault;
    }

    /**
     * @param StrategyNetworkDefault $NetworkDefault
     * @return \eLama\DirectApiV5\Dto\Campaign\TextCampaignNetworkStrategy
     */
    public function setNetworkDefault(StrategyNetworkDefault $NetworkDefault = null)
    {
      $this->NetworkDefault = $NetworkDefault;
      return $this;
    }

}
