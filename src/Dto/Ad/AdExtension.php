<?php

namespace eLama\DirectApiV5\Dto\Ad;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class AdExtension extends AdExtensionBase
{

    /**
     * @JMS\Type("integer")
     *
     * @var int $AdExtensionId
     */
    private $AdExtensionId;

    /**
     * @return int
     */
    public function getAdExtensionId()
    {
      return $this->AdExtensionId;
    }

    /**
     * @param int $AdExtensionId
     * @return \eLama\DirectApiV5\Dto\Ad\AdExtension
     */
    public function setAdExtensionId($AdExtensionId = null)
    {
      $this->AdExtensionId = $AdExtensionId;
      return $this;
    }

}
