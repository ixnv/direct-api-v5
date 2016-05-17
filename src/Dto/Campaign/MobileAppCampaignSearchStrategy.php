<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class MobileAppCampaignSearchStrategy extends MobileAppCampaignStrategyBase
{

    /**
     * @JMS\Type("string")
     *
     * @var MobileAppCampaignSearchStrategyTypeEnum $BiddingStrategyType
     */
    private $BiddingStrategyType;

    /**
     * @param MobileAppCampaignSearchStrategyTypeEnum $BiddingStrategyType
     */
    public function __construct($BiddingStrategyType = null)
    {
      parent::__construct();
      $this->BiddingStrategyType = $BiddingStrategyType;
    }

    /**
     * @return MobileAppCampaignSearchStrategyTypeEnum
     */
    public function getBiddingStrategyType()
    {
      return $this->BiddingStrategyType;
    }

    /**
     * @param MobileAppCampaignSearchStrategyTypeEnum $BiddingStrategyType
     * @return \eLama\DirectApiV5\Dto\Campaign\MobileAppCampaignSearchStrategy
     */
    public function setBiddingStrategyType($BiddingStrategyType)
    {
      $this->BiddingStrategyType = $BiddingStrategyType;
      return $this;
    }

}
