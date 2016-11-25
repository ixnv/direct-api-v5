<?php

namespace eLama\DirectApiV5\Dto\Client;

use eLama\DirectApiV5\Dto\Client\Enum\ClientRestrictionEnum;
use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class ClientRestrictionItem
{

    /**
     * @JMS\Type("string")
     *
     * @var ClientRestrictionEnum $Element
     */
    private $Element;

    /**
     * @JMS\Type("integer")
     *
     * @var int $Value
     */
    private $Value;

    /**
     * @param ClientRestrictionEnum $Element
     * @param int $Value
     */
    public function __construct($Element = null, $Value = null)
    {
      $this->Element = $Element;
      $this->Value = $Value;
    }

    /**
     * @return ClientRestrictionEnum
     */
    public function getElement()
    {
      return $this->Element;
    }

    /**
     * @param ClientRestrictionEnum $Element
     * @return \eLama\DirectApiV5\Dto\Client\ClientRestrictionItem
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
     * @return \eLama\DirectApiV5\Dto\Client\ClientRestrictionItem
     */
    public function setValue($Value)
    {
      $this->Value = $Value;
      return $this;
    }

}
