<?php

namespace eLama\DirectApiV5\Dto\AdExtensions;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class AdExtensionAddItem
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\AdExtensions\Callout")
     *
     * @var Callout $Callout
     */
    private $Callout;

    /**
     * @param Callout $callout
     */
    public function __construct(Callout $callout)
    {
        $this->Callout = $callout;
    }

    /**
     * @return Callout
     */
    public function getCallout()
    {
      return $this->Callout;
    }

    /**
     * @param Callout $Callout
     * @return \eLama\DirectApiV5\Dto\AdExtensions\AdExtensionAddItem
     */
    public function setCallout(Callout $Callout)
    {
      $this->Callout = $Callout;
      return $this;
    }

}
