<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class MobileAppCampaignStrategyAdd
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\MobileAppCampaignSearchStrategyAdd")
     *
     * @var MobileAppCampaignSearchStrategyAdd $Search
     */
    private $Search;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\MobileAppCampaignNetworkStrategyAdd")
     *
     * @var MobileAppCampaignNetworkStrategyAdd $Network
     */
    private $Network;

    /**
     * @param MobileAppCampaignSearchStrategyAdd $Search
     * @param MobileAppCampaignNetworkStrategyAdd $Network
     */
    public function __construct(MobileAppCampaignSearchStrategyAdd $Search = null, MobileAppCampaignNetworkStrategyAdd $Network = null)
    {
      $this->Search = $Search;
      $this->Network = $Network;
    }

    /**
     * @return MobileAppCampaignSearchStrategyAdd
     */
    public function getSearch()
    {
      return $this->Search;
    }

    /**
     * @param MobileAppCampaignSearchStrategyAdd $Search
     * @return \eLama\DirectApiV5\Dto\Campaign\MobileAppCampaignStrategyAdd
     */
    public function setSearch(MobileAppCampaignSearchStrategyAdd $Search)
    {
      $this->Search = $Search;
      return $this;
    }

    /**
     * @return MobileAppCampaignNetworkStrategyAdd
     */
    public function getNetwork()
    {
      return $this->Network;
    }

    /**
     * @param MobileAppCampaignNetworkStrategyAdd $Network
     * @return \eLama\DirectApiV5\Dto\Campaign\MobileAppCampaignStrategyAdd
     */
    public function setNetwork(MobileAppCampaignNetworkStrategyAdd $Network)
    {
      $this->Network = $Network;
      return $this;
    }

}
