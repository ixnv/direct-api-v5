<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\Campaign\Enum\MobileAppCampaignSettingsEnum;
use eLama\DirectApiV5\Dto\General\Enum\YesNoEnum;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class MobileAppCampaignSetting
{

    /**
     * @JMS\Type("string")
     *
     * @var MobileAppCampaignSettingsEnum $Option
     */
    private $Option;

    /**
     * @JMS\Type("string")
     *
     * @var YesNoEnum $Value
     */
    private $Value;

    /**
     * @param MobileAppCampaignSettingsEnum $Option
     * @param YesNoEnum $Value
     */
    public function __construct($Option = null, $Value = null)
    {
      $this->Option = $Option;
      $this->Value = $Value;
    }

    /**
     * @return MobileAppCampaignSettingsEnum
     */
    public function getOption()
    {
      return $this->Option;
    }

    /**
     * @param MobileAppCampaignSettingsEnum $Option
     * @return \eLama\DirectApiV5\Dto\Campaign\MobileAppCampaignSetting
     */
    public function setOption($Option)
    {
      $this->Option = $Option;
      return $this;
    }

    /**
     * @return YesNoEnum
     */
    public function getValue()
    {
      return $this->Value;
    }

    /**
     * @param YesNoEnum $Value
     * @return \eLama\DirectApiV5\Dto\Campaign\MobileAppCampaignSetting
     */
    public function setValue($Value)
    {
      $this->Value = $Value;
      return $this;
    }

}
