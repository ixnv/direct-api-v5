<?php

namespace eLama\DirectApiV5\Dto\Ad;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class DynamicTextAdGet extends TextAdGetBase
{

    /**
     * @JMS\Type("string")
     *
     * @var string $Text
     */
    private $Text;

    /**
     * @return string
     */
    public function getText()
    {
      return $this->Text;
    }

    /**
     * @param string $Text
     * @return \eLama\DirectApiV5\Dto\Ad\DynamicTextAdGet
     */
    public function setText($Text = null)
    {
      $this->Text = $Text;
      return $this;
    }

}
