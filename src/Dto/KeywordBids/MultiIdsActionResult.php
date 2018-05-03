<?php

namespace eLama\DirectApiV5\Dto\Keywordbids;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class MultiIdsActionResult extends ActionResultBase
{

    /**
     * @JMS\Type("array<integer>")
     *
     * @var long[] $Ids
     */
    private $Ids;

    /**
     * @return long[]
     */
    public function getIds()
    {
      return $this->Ids;
    }

    /**
     * @param long[] $Ids
     * @return \eLama\DirectApiV5\Dto\Keywordbids\MultiIdsActionResult
     */
    public function setIds(array $Ids = null)
    {
      $this->Ids = $Ids;
      return $this;
    }

}
