<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class TextCampaignStrategyAdd
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\TextCampaignSearchStrategyAdd")
     *
     * @var TextCampaignSearchStrategyAdd $Search
     */
    private $Search;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\TextCampaignNetworkStrategyAdd")
     *
     * @var TextCampaignNetworkStrategyAdd $Network
     */
    private $Network;

    /**
     * @param TextCampaignSearchStrategyAdd $Search
     * @param TextCampaignNetworkStrategyAdd $Network
     */
    public function __construct(TextCampaignSearchStrategyAdd $Search = null, TextCampaignNetworkStrategyAdd $Network = null)
    {
      $this->Search = $Search;
      $this->Network = $Network;
    }

    /**
     * @return TextCampaignSearchStrategyAdd
     */
    public function getSearch()
    {
      return $this->Search;
    }

    /**
     * @param TextCampaignSearchStrategyAdd $Search
     * @return \eLama\DirectApiV5\Dto\Campaign\TextCampaignStrategyAdd
     */
    public function setSearch(TextCampaignSearchStrategyAdd $Search)
    {
      $this->Search = $Search;
      return $this;
    }

    /**
     * @return TextCampaignNetworkStrategyAdd
     */
    public function getNetwork()
    {
      return $this->Network;
    }

    /**
     * @param TextCampaignNetworkStrategyAdd $Network
     * @return \eLama\DirectApiV5\Dto\Campaign\TextCampaignStrategyAdd
     */
    public function setNetwork(TextCampaignNetworkStrategyAdd $Network)
    {
      $this->Network = $Network;
      return $this;
    }

}
