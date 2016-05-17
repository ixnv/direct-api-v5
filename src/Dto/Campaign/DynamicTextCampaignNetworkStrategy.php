<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class DynamicTextCampaignNetworkStrategy
{

    /**
     * @JMS\Type("string")
     *
     * @var DynamicTextCampaignNetworkStrategyTypeEnum $BiddingStrategyType
     */
    private $BiddingStrategyType;

    /**
     * @param DynamicTextCampaignNetworkStrategyTypeEnum $BiddingStrategyType
     */
    public function __construct($BiddingStrategyType = null)
    {
      $this->BiddingStrategyType = $BiddingStrategyType;
    }

    /**
     * @return DynamicTextCampaignNetworkStrategyTypeEnum
     */
    public function getBiddingStrategyType()
    {
      return $this->BiddingStrategyType;
    }

    /**
     * @param DynamicTextCampaignNetworkStrategyTypeEnum $BiddingStrategyType
     * @return \eLama\DirectApiV5\Dto\Campaign\DynamicTextCampaignNetworkStrategy
     */
    public function setBiddingStrategyType($BiddingStrategyType)
    {
      $this->BiddingStrategyType = $BiddingStrategyType;
      return $this;
    }

}
