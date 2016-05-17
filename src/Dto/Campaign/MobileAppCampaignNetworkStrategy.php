<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class MobileAppCampaignNetworkStrategy extends MobileAppCampaignStrategyBase
{

    /**
     * @JMS\Type("string")
     *
     * @var MobileAppCampaignNetworkStrategyTypeEnum $BiddingStrategyType
     */
    private $BiddingStrategyType;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\StrategyNetworkDefault")
     *
     * @var StrategyNetworkDefault $NetworkDefault
     */
    private $NetworkDefault;

    /**
     * @param MobileAppCampaignNetworkStrategyTypeEnum $BiddingStrategyType
     */
    public function __construct($BiddingStrategyType = null)
    {
      parent::__construct();
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
     * @return \eLama\DirectApiV5\Dto\Campaign\MobileAppCampaignNetworkStrategy
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
     * @return \eLama\DirectApiV5\Dto\Campaign\MobileAppCampaignNetworkStrategy
     */
    public function setNetworkDefault(StrategyNetworkDefault $NetworkDefault = null)
    {
      $this->NetworkDefault = $NetworkDefault;
      return $this;
    }

}
