<?php

namespace eLama\DirectApiV5\Dto\Client;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class EmailSubscriptionItem
{

    /**
     * @JMS\Type("string")
     *
     * @var EmailSubscriptionEnum $Option
     */
    private $Option;

    /**
     * @JMS\Type("string")
     *
     * @var YesNoEnum $Value
     */
    private $Value;

    /**
     * @param EmailSubscriptionEnum $Option
     * @param YesNoEnum $Value
     */
    public function __construct($Option = null, $Value = null)
    {
      $this->Option = $Option;
      $this->Value = $Value;
    }

    /**
     * @return EmailSubscriptionEnum
     */
    public function getOption()
    {
      return $this->Option;
    }

    /**
     * @param EmailSubscriptionEnum $Option
     * @return \eLama\DirectApiV5\Dto\Client\EmailSubscriptionItem
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
     * @return \eLama\DirectApiV5\Dto\Client\EmailSubscriptionItem
     */
    public function setValue($Value)
    {
      $this->Value = $Value;
      return $this;
    }

}
