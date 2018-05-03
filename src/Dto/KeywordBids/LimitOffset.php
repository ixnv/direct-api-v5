<?php

namespace eLama\DirectApiV5\Dto\Keywordbids;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class LimitOffset
{

    /**
     * @JMS\Type("integer")
     *
     * @var int $Limit
     */
    private $Limit;

    /**
     * @JMS\Type("integer")
     *
     * @var int $Offset
     */
    private $Offset;

    /**
     * @return int
     */
    public function getLimit()
    {
      return $this->Limit;
    }

    /**
     * @param int $Limit
     * @return \eLama\DirectApiV5\Dto\Keywordbids\LimitOffset
     */
    public function setLimit(int $Limit = null)
    {
      $this->Limit = $Limit;
      return $this;
    }

    /**
     * @return int
     */
    public function getOffset()
    {
      return $this->Offset;
    }

    /**
     * @param int $Offset
     * @return \eLama\DirectApiV5\Dto\Keywordbids\LimitOffset
     */
    public function setOffset(int $Offset = null)
    {
      $this->Offset = $Offset;
      return $this;
    }

}
