<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class TextCampaignStrategy
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\TextCampaignSearchStrategy")
     *
     * @var TextCampaignSearchStrategy $Search
     */
    private $Search;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\TextCampaignNetworkStrategy")
     *
     * @var TextCampaignNetworkStrategy $Network
     */
    private $Network;

    /**
     * @return TextCampaignSearchStrategy
     */
    public function getSearch()
    {
      return $this->Search;
    }

    /**
     * @param TextCampaignSearchStrategy $Search
     * @return \eLama\DirectApiV5\Dto\Campaign\TextCampaignStrategy
     */
    public function setSearch(TextCampaignSearchStrategy $Search = null)
    {
      $this->Search = $Search;
      return $this;
    }

    /**
     * @return TextCampaignNetworkStrategy
     */
    public function getNetwork()
    {
      return $this->Network;
    }

    /**
     * @param TextCampaignNetworkStrategy $Network
     * @return \eLama\DirectApiV5\Dto\Campaign\TextCampaignStrategy
     */
    public function setNetwork(TextCampaignNetworkStrategy $Network = null)
    {
      $this->Network = $Network;
      return $this;
    }

}
