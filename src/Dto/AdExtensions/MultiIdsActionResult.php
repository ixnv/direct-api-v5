<?php

namespace eLama\DirectApiV5\Dto\AdExtensions;

use eLama\DirectApiV5\Dto\General\ActionResultBase;
use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class MultiIdsActionResult extends ActionResultBase
{

    /**
     * @JMS\Type("array<integer>")
     *
     * @var int[] $Ids
     */
    private $Ids;

    /**
     * @return int[]
     */
    public function getIds()
    {
      return $this->Ids;
    }

    /**
     * @param int[] $Ids
     * @return \eLama\DirectApiV5\Dto\AdExtensions\MultiIdsActionResult
     */
    public function setIds(array $Ids = null)
    {
      $this->Ids = $Ids;
      return $this;
    }

}
