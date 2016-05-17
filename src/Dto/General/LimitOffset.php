<?php


namespace eLama\DirectApiV5\Dto\General;

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

    public function __construct($limit = null, $offset = null)
    {
        $this->Limit = $limit;
        $this->Offset = $offset;
    }

    /**
     * @return int
     */
    public function getLimit()
    {
      return $this->Limit;
    }

    /**
     * @param int $Limit
     * @return self
     */
    public function setLimit($Limit = null)
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
     * @return self
     */
    public function setOffset($Offset = null)
    {
      $this->Offset = $Offset;
      return $this;
    }

}
