<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class DynamicTextCampaignStrategy
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\DynamicTextCampaignSearchStrategy")
     *
     * @var DynamicTextCampaignSearchStrategy $Search
     */
    private $Search;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\DynamicTextCampaignNetworkStrategy")
     *
     * @var DynamicTextCampaignNetworkStrategy $Network
     */
    private $Network;

    /**
     * @return DynamicTextCampaignSearchStrategy
     */
    public function getSearch()
    {
      return $this->Search;
    }

    /**
     * @param DynamicTextCampaignSearchStrategy $Search
     * @return \eLama\DirectApiV5\Dto\Campaign\DynamicTextCampaignStrategy
     */
    public function setSearch(DynamicTextCampaignSearchStrategy $Search = null)
    {
      $this->Search = $Search;
      return $this;
    }

    /**
     * @return DynamicTextCampaignNetworkStrategy
     */
    public function getNetwork()
    {
      return $this->Network;
    }

    /**
     * @param DynamicTextCampaignNetworkStrategy $Network
     * @return \eLama\DirectApiV5\Dto\Campaign\DynamicTextCampaignStrategy
     */
    public function setNetwork(DynamicTextCampaignNetworkStrategy $Network = null)
    {
      $this->Network = $Network;
      return $this;
    }

}
