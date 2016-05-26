<?php


namespace eLama\DirectApiV5\Dto\General;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
abstract class GetResultGeneral
{
    /**
     * @JMS\Type("integer")
     *
     * @var int $LimitedBy
     */
    private $LimitedBy;

    /**
     * @return int
     */
    public function getLimitedBy()
    {
      return $this->LimitedBy;
    }

    /**
     * @param int $LimitedBy
     * @return self
     */
    public function setLimitedBy($LimitedBy = null)
    {
      $this->LimitedBy = $LimitedBy;

      return $this;
    }

    /**
     * @return mixed
     */
    abstract public function getItems();
}
