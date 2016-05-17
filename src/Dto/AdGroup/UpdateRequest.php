<?php

namespace eLama\DirectApiV5\Dto\AdGroup;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class UpdateRequest
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\AdGroup\AdGroupUpdateItem")
     *
     * @var AdGroupUpdateItem $AdGroups
     */
    private $AdGroups;

    /**
     * @param AdGroupUpdateItem $AdGroups
     */
    public function __construct(AdGroupUpdateItem $AdGroups = null)
    {
      $this->AdGroups = $AdGroups;
    }

    /**
     * @return AdGroupUpdateItem
     */
    public function getAdGroups()
    {
      return $this->AdGroups;
    }

    /**
     * @param AdGroupUpdateItem $AdGroups
     * @return \eLama\DirectApiV5\Dto\AdGroup\UpdateRequest
     */
    public function setAdGroups(AdGroupUpdateItem $AdGroups)
    {
      $this->AdGroups = $AdGroups;
      return $this;
    }

}
