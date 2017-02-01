<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\Campaign\Enum\MobileAppCampaignNetworkStrategyTypeEnum;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class MobileAppCampaignNetworkStrategyAdd extends MobileAppCampaignStrategyAddBase
{

    /**
     * @JMS\Type("string")
     *
     * @var MobileAppCampaignNetworkStrategyTypeEnum $BiddingStrategyType
     */
    private $BiddingStrategyType;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\StrategyNetworkDefaultAdd")
     *
     * @var StrategyNetworkDefaultAdd $NetworkDefault
     */
    private $NetworkDefault;

    /**
     * @param MobileAppCampaignNetworkStrategyTypeEnum $BiddingStrategyType
     */
    public function __construct($BiddingStrategyType = null)
    {
      $this->BiddingStrategyType = $BiddingStrategyType;
    }

    /**
     * @return MobileAppCampaignNetworkStrategyTypeEnum
     */
    public function getBiddingStrategyType()
    {
      return $this->BiddingStrategyType;
    }

    /**
     * @param MobileAppCampaignNetworkStrategyTypeEnum $BiddingStrategyType
     * @return \eLama\DirectApiV5\Dto\Campaign\MobileAppCampaignNetworkStrategyAdd
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
     * @return \eLama\DirectApiV5\Dto\Campaign\MobileAppCampaignNetworkStrategyAdd
     */
    public function setNetworkDefault(StrategyNetworkDefaultAdd $NetworkDefault = null)
    {
      $this->NetworkDefault = $NetworkDefault;
      return $this;
    }

}
