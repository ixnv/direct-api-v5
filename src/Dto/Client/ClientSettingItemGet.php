<?php

namespace eLama\DirectApiV5\Dto\Client;

use eLama\DirectApiV5\Dto\Client\Enum\ClientSettingGetEnum;
use eLama\DirectApiV5\Dto\General\Enum\YesNoEnum;
use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class ClientSettingItemGet
{

    /**
     * @JMS\Type("string")
     *
     * @var ClientSettingGetEnum $Option
     */
    private $Option;

    /**
     * @JMS\Type("string")
     *
     * @var YesNoEnum $Value
     */
    private $Value;

    /**
     * @param ClientSettingGetEnum $Option
     * @param YesNoEnum $Value
     */
    public function __construct($Option = null, $Value = null)
    {
        $this->Option = $Option;
        $this->Value = $Value;
    }

    /**
     * @return ClientSettingGetEnum
     */
    public function getOption()
    {
        return $this->Option;
    }

    /**
     * @param ClientSettingGetEnum $Option
     * @return \eLama\DirectApiV5\Dto\Client\ClientSettingItemGet
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
     * @return \eLama\DirectApiV5\Dto\Client\ClientSettingItemGet
     */
    public function setValue($Value)
    {
        $this->Value = $Value;
        return $this;
    }
}
