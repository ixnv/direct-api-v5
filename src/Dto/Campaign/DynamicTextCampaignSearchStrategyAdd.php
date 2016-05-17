<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class DynamicTextCampaignSearchStrategyAdd extends DynamicTextCampaignStrategyAddBase
{

    /**
     * @JMS\Type("string")
     *
     * @var DynamicTextCampaignSearchStrategyTypeEnum $BiddingStrategyType
     */
    private $BiddingStrategyType;

    /**
     * @param DynamicTextCampaignSearchStrategyTypeEnum $BiddingStrategyType
     */
    public function __construct($BiddingStrategyType = null)
    {
      parent::__construct();
      $this->BiddingStrategyType = $BiddingStrategyType;
    }

    /**
     * @return DynamicTextCampaignSearchStrategyTypeEnum
     */
    public function getBiddingStrategyType()
    {
      return $this->BiddingStrategyType;
    }

    /**
     * @param DynamicTextCampaignSearchStrategyTypeEnum $BiddingStrategyType
     * @return \eLama\DirectApiV5\Dto\Campaign\DynamicTextCampaignSearchStrategyAdd
     */
    public function setBiddingStrategyType($BiddingStrategyType)
    {
      $this->BiddingStrategyType = $BiddingStrategyType;
      return $this;
    }

}
