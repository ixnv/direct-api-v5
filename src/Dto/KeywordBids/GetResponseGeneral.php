<?php

namespace eLama\DirectApiV5\Dto\Keywordbids;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class GetResponseGeneral
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
     * @return \eLama\DirectApiV5\Dto\Keywordbids\GetResponseGeneral
     */
    public function setLimitedBy(int $LimitedBy = null)
    {
      $this->LimitedBy = $LimitedBy;
      return $this;
    }

}
