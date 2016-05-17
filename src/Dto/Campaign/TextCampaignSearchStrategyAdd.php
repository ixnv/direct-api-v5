<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class TextCampaignSearchStrategyAdd extends TextCampaignStrategyAddBase
{

    /**
     * @JMS\Type("string")
     *
     * @var TextCampaignSearchStrategyTypeEnum $BiddingStrategyType
     */
    private $BiddingStrategyType;

    /**
     * @param TextCampaignSearchStrategyTypeEnum $BiddingStrategyType
     */
    public function __construct($BiddingStrategyType = null)
    {
      parent::__construct();
      $this->BiddingStrategyType = $BiddingStrategyType;
    }

    /**
     * @return TextCampaignSearchStrategyTypeEnum
     */
    public function getBiddingStrategyType()
    {
      return $this->BiddingStrategyType;
    }

    /**
     * @param TextCampaignSearchStrategyTypeEnum $BiddingStrategyType
     * @return \eLama\DirectApiV5\Dto\Campaign\TextCampaignSearchStrategyAdd
     */
    public function setBiddingStrategyType($BiddingStrategyType)
    {
      $this->BiddingStrategyType = $BiddingStrategyType;
      return $this;
    }

}
