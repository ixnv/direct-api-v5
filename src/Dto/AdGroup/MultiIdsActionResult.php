<?php

namespace eLama\DirectApiV5\Dto\AdGroup;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class MultiIdsActionResult
{

    /**
     * @JMS\Type("integer")
     *
     * @var int $Ids
     */
    private $Ids;

    /**
     * @param int $Ids
     */
    public function __construct($Ids = null)
    {
      $this->Ids = $Ids;
    }

    /**
     * @return int
     */
    public function getIds()
    {
      return $this->Ids;
    }

    /**
     * @param int $Ids
     * @return \eLama\DirectApiV5\Dto\AdGroup\MultiIdsActionResult
     */
    public function setIds($Ids)
    {
      $this->Ids = $Ids;
      return $this;
    }

}
