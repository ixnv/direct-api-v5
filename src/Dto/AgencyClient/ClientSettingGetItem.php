<?php

namespace eLama\DirectApiV5\Dto\AgencyClient;

class ClientSettingGetItem
{
    /**
     * @var string $Option
     */
    protected $Option;

    /**
     * @var string $Value
     */
    protected $Value;

    /**
     * @param string $option
     * @param string $value
     */
    public function __construct($option, $value)
    {
        $this->Option = $option;
        $this->Value = $value;
    }

    /**
     * @return string
     */
    public function getOption()
    {
        return $this->Option;
    }

    /**
     * @param string $Option
     * @return self
     */
    public function setOption($Option)
    {
        $this->Option = $Option;
    
        return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->Value;
    }

    /**
     * @param string $Value
     * @return self
     */
    public function setValue($Value)
    {
        $this->Value = $Value;
    
        return $this;
    }
}
