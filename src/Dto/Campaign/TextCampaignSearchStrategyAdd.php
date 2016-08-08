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
     * @param string $BiddingStrategyType
     * @see TextCampaignSearchStrategyTypeEnum
     */
    public function __construct($BiddingStrategyType)
    {
      $this->BiddingStrategyType = $BiddingStrategyType;
    }

    /**
     * @return string @see TextCampaignSearchStrategyTypeEnum
     */
    public function getBiddingStrategyType()
    {
      return $this->BiddingStrategyType;
    }

    /**
     * @param string $BiddingStrategyType @see TextCampaignSearchStrategyTypeEnum
     * @return \eLama\DirectApiV5\Dto\Campaign\TextCampaignSearchStrategyAdd
     */
    public function setBiddingStrategyType($BiddingStrategyType)
    {
      $this->BiddingStrategyType = $BiddingStrategyType;
      return $this;
    }

}
