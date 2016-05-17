<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class DynamicTextCampaignSettingGet
{

    /**
     * @JMS\Type("string")
     *
     * @var DynamicTextCampaignSettingsGetEnum $Option
     */
    private $Option;

    /**
     * @JMS\Type("string")
     *
     * @var YesNoEnum $Value
     */
    private $Value;

    /**
     * @param DynamicTextCampaignSettingsGetEnum $Option
     * @param YesNoEnum $Value
     */
    public function __construct($Option = null, $Value = null)
    {
      $this->Option = $Option;
      $this->Value = $Value;
    }

    /**
     * @return DynamicTextCampaignSettingsGetEnum
     */
    public function getOption()
    {
      return $this->Option;
    }

    /**
     * @param DynamicTextCampaignSettingsGetEnum $Option
     * @return \eLama\DirectApiV5\Dto\Campaign\DynamicTextCampaignSettingGet
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
     * @return \eLama\DirectApiV5\Dto\Campaign\DynamicTextCampaignSettingGet
     */
    public function setValue($Value)
    {
      $this->Value = $Value;
      return $this;
    }

}
