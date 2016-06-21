<?php

namespace eLama\DirectApiV5\Dto\AdGroup;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class AddRequest
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\AdGroup\AdGroupAddItem")
     *
     * @var AdGroupAddItem $AdGroups
     */
    private $AdGroups;

    /**
     * @param AdGroupAddItem $AdGroups
     */
    public function __construct(AdGroupAddItem $AdGroups = null)
    {
      $this->AdGroups = $AdGroups;
    }

    /**
     * @return AdGroupAddItem
     */
    public function getAdGroups()
    {
      return $this->AdGroups;
    }

    /**
     * @param AdGroupAddItem $AdGroups
     * @return \eLama\DirectApiV5\Dto\AdGroup\AddRequest
     */
    public function setAdGroups(AdGroupAddItem $AdGroups)
    {
      $this->AdGroups = $AdGroups;
      return $this;
    }

}
