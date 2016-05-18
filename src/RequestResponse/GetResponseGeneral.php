<?php


namespace eLama\DirectApiV5\RequestResponse;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class GetResponseGeneral
{

    //TODO Add units info

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

}
