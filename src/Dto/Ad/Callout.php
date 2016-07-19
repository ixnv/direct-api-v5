<?php

namespace eLama\DirectApiV5\Dto\Ad;

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
     * @return \eLama\DirectApiV5\Dto\Ad\Callout
     */
    public function setCalloutText($CalloutText)
    {
      $this->CalloutText = $CalloutText;
      return $this;
    }

}
