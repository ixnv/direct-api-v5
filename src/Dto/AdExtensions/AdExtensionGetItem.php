<?php

namespace eLama\DirectApiV5\Dto\AdExtensions;

use eLama\DirectApiV5\Dto\General\YesNoEnum;
use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class AdExtensionGetItem extends AdExtensionBase
{

    /**
     * @JMS\Type("integer")
     *
     * @var int $Id
     */
    private $Id;

    /**
     * @JMS\Type("string")
     *
     * @var YesNoEnum $Associated
     */
    private $Associated;

    /**
     * @return int
     */
    public function getId()
    {
      return $this->Id;
    }

    /**
     * @param int $Id
     * @return \eLama\DirectApiV5\Dto\AdExtensions\AdExtensionGetItem
     */
    public function setId($Id = null)
    {
      $this->Id = $Id;
      return $this;
    }

    /**
     * @return YesNoEnum
     */
    public function getAssociated()
    {
      return $this->Associated;
    }

    /**
     * @param YesNoEnum $Associated
     * @return \eLama\DirectApiV5\Dto\AdExtensions\AdExtensionGetItem
     */
    public function setAssociated($Associated = null)
    {
      $this->Associated = $Associated;
      return $this;
    }

}
