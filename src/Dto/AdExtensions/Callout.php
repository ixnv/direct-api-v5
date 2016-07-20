<?php

namespace eLama\DirectApiV5\Dto\AdExtensions;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class Callout
{

    /**
     * @JMS\Type("string")
     *
     * @var string $CalloutText
     */
    private $CalloutText;

    /**
     * @param string $CalloutText
     */
    public function __construct($CalloutText = null)
    {
      $this->CalloutText = $CalloutText;
    }

    /**
     * @return string
     */
    public function getCalloutText()
    {
      return $this->CalloutText;
    }

    /**
     * @param string $CalloutText
     * @return \eLama\DirectApiV5\Dto\AdExtensions\Callout
     */
    public function setCalloutText($CalloutText)
    {
      $this->CalloutText = $CalloutText;
      return $this;
    }

}
