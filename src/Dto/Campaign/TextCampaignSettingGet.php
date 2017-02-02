<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\Campaign\Enum\TextCampaignSettingsGetEnum;
use eLama\DirectApiV5\Dto\General\Enum\YesNoEnum;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class TextCampaignSettingGet
{

    /**
     * @JMS\Type("string")
     *
     * @var TextCampaignSettingsGetEnum $Option
     */
    private $Option;

    /**
     * @JMS\Type("string")
     *
     * @var YesNoEnum $Value
     */
    private $Value;

    /**
     * @param TextCampaignSettingsGetEnum $Option
     * @param YesNoEnum $Value
     */
    public function __construct($Option = null, $Value = null)
    {
      $this->Option = $Option;
      $this->Value = $Value;
    }

    /**
     * @return TextCampaignSettingsGetEnum
     */
    public function getOption()
    {
      return $this->Option;
    }

    /**
     * @param TextCampaignSettingsGetEnum $Option
     * @return \eLama\DirectApiV5\Dto\Campaign\TextCampaignSettingGet
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
     * @return \eLama\DirectApiV5\Dto\Campaign\TextCampaignSettingGet
     */
    public function setValue($Value)
    {
      $this->Value = $Value;
      return $this;
    }

}
