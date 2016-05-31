<?php

namespace eLama\DirectApiV5\Dto\Changes;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class IdsCriteria
{

    /**
     * @JMS\Type("array<integer>")
     *
     * @var int[] $Ids
     */
    private $Ids;

    /**
     * @param int[] $Ids
     */
    public function __construct(array $Ids = null)
    {
      $this->Ids = $Ids;
    }

    /**
     * @return int[]
     */
    public function getIds()
    {
      return $this->Ids;
    }

    /**
     * @param int[] $Ids
     * @return \eLama\DirectApiV5\Dto\Changes\IdsCriteria
     */
    public function setIds(array $Ids)
    {
      $this->Ids = $Ids;
      return $this;
    }

}
