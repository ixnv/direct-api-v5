<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class DynamicTextCampaignStrategyAdd
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\DynamicTextCampaignSearchStrategyAdd")
     *
     * @var DynamicTextCampaignSearchStrategyAdd $Search
     */
    private $Search;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\DynamicTextCampaignNetworkStrategyAdd")
     *
     * @var DynamicTextCampaignNetworkStrategyAdd $Network
     */
    private $Network;

    /**
     * @param DynamicTextCampaignSearchStrategyAdd $Search
     * @param DynamicTextCampaignNetworkStrategyAdd $Network
     */
    public function __construct(DynamicTextCampaignSearchStrategyAdd $Search = null, DynamicTextCampaignNetworkStrategyAdd $Network = null)
    {
      $this->Search = $Search;
      $this->Network = $Network;
    }

    /**
     * @return DynamicTextCampaignSearchStrategyAdd
     */
    public function getSearch()
    {
      return $this->Search;
    }

    /**
     * @param DynamicTextCampaignSearchStrategyAdd $Search
     * @return \eLama\DirectApiV5\Dto\Campaign\DynamicTextCampaignStrategyAdd
     */
    public function setSearch(DynamicTextCampaignSearchStrategyAdd $Search)
    {
      $this->Search = $Search;
      return $this;
    }

    /**
     * @return DynamicTextCampaignNetworkStrategyAdd
     */
    public function getNetwork()
    {
      return $this->Network;
    }

    /**
     * @param DynamicTextCampaignNetworkStrategyAdd $Network
     * @return \eLama\DirectApiV5\Dto\Campaign\DynamicTextCampaignStrategyAdd
     */
    public function setNetwork(DynamicTextCampaignNetworkStrategyAdd $Network)
    {
      $this->Network = $Network;
      return $this;
    }

}
