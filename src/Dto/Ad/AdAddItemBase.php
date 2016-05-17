<?php

namespace eLama\DirectApiV5\Dto\Ad;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class AdAddItemBase
{

    /**
     * @JMS\Type("integer")
     *
     * @var int $AdGroupId
     */
    private $AdGroupId;

    /**
     * @param int $AdGroupId
     */
    public function __construct($AdGroupId = null)
    {
      $this->AdGroupId = $AdGroupId;
    }

    /**
     * @return int
     */
    public function getAdGroupId()
    {
      return $this->AdGroupId;
    }

    /**
     * @param int $AdGroupId
     * @return \eLama\DirectApiV5\Dto\Ad\AdAddItemBase
     */
    public function setAdGroupId($AdGroupId)
    {
      $this->AdGroupId = $AdGroupId;
      return $this;
    }

}
