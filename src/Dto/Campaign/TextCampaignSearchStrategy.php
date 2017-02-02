<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class TextCampaignSearchStrategy extends TextCampaignStrategyBase
{

    /**
     * @JMS\Type("string")
     *
     * @var TextCampaignSearchStrategyTypeEnum $BiddingStrategyType
     */
    private $BiddingStrategyType;

    /**
     * @param string $BiddingStrategyType
     * @see TextCampaignSearchStrategyTypeEnum $BiddingStrategyType
     */
    public function __construct($BiddingStrategyType = null)
    {
      $this->BiddingStrategyType = $BiddingStrategyType;
    }

    /**
     * @see TextCampaignSearchStrategyTypeEnum
     * @return string
     */
    public function getBiddingStrategyType()
    {
      return $this->BiddingStrategyType;
    }

    /**
     * @see TextCampaignSearchStrategyTypeEnum
     * @param string $BiddingStrategyType
     * @return \eLama\DirectApiV5\Dto\Campaign\TextCampaignSearchStrategy
     */
    public function setBiddingStrategyType($BiddingStrategyType)
    {
      $this->BiddingStrategyType = $BiddingStrategyType;
      return $this;
    }

}
