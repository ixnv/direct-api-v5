<?php

namespace eLama\DirectApiV5\Dto\General;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class ActionResult extends ActionResultBase
{

    /**
     * @JMS\Type("integer")
     *
     * @var int $Id
     */
    private $Id;

    /**
     * @param int $Id
     */
    public function __construct($Id)
    {
        $this->Id = $Id;
    }

    /**
     * @return int
     */
    public function getId()
    {
      return $this->Id;
    }

    /**
     * @param int $Id
     * @return self
     */
    public function setId($Id = null)
    {
      $this->Id = $Id;
      return $this;
    }

}
