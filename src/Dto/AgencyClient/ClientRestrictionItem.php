<?php

namespace eLama\DirectApiV5\Dto\AgencyClient;

class ClientRestrictionItem
{
    /**
     * @var string $Element
     */
    protected $Element;

    /**
     * @var int $Value
     */
    protected $Value;

    /**
     * @param string $element
     * @param int $value
     */
    public function __construct($element, $value)
    {
        $this->Element = $element;
        $this->Value = $value;
    }

    /**
     * @return string
     */
    public function getElement()
    {
        return $this->Element;
    }

    /**
     * @param string $Element
     * @return self
     */
    public function setElement($Element)
    {
        $this->Element = $Element;
    
        return $this;
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->Value;
    }

    /**
     * @param int $Value
     * @return self
     */
    public function setValue($Value)
    {
        $this->Value = $Value;
    
        return $this;
    }
}
