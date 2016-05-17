<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class MobileAppCampaignStrategy
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\MobileAppCampaignSearchStrategy")
     *
     * @var MobileAppCampaignSearchStrategy $Search
     */
    private $Search;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\MobileAppCampaignNetworkStrategy")
     *
     * @var MobileAppCampaignNetworkStrategy $Network
     */
    private $Network;

    /**
     * @return MobileAppCampaignSearchStrategy
     */
    public function getSearch()
    {
      return $this->Search;
    }

    /**
     * @param MobileAppCampaignSearchStrategy $Search
     * @return \eLama\DirectApiV5\Dto\Campaign\MobileAppCampaignStrategy
     */
    public function setSearch(MobileAppCampaignSearchStrategy $Search = null)
    {
      $this->Search = $Search;
      return $this;
    }

    /**
     * @return MobileAppCampaignNetworkStrategy
     */
    public function getNetwork()
    {
      return $this->Network;
    }

    /**
     * @param MobileAppCampaignNetworkStrategy $Network
     * @return \eLama\DirectApiV5\Dto\Campaign\MobileAppCampaignStrategy
     */
    public function setNetwork(MobileAppCampaignNetworkStrategy $Network = null)
    {
      $this->Network = $Network;
      return $this;
    }

}
