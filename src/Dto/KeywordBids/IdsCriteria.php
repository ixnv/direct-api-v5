<?php

namespace eLama\DirectApiV5\Dto\Keywordbids;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class IdsCriteria
{

    /**
     * @JMS\Type("array<integer>")
     *
     * @var long[] $Ids
     */
    private $Ids;

    /**
     * @param long[] $Ids
     */
    public function __construct(array $Ids = null)
    {
      $this->Ids = $Ids;
    }

    /**
     * @return long[]
     */
    public function getIds()
    {
      return $this->Ids;
    }

    /**
     * @param long[] $Ids
     * @return \eLama\DirectApiV5\Dto\Keywordbids\IdsCriteria
     */
    public function setIds(array $Ids)
    {
      $this->Ids = $Ids;
      return $this;
    }

}
