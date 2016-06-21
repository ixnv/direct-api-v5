<?php

namespace eLama\DirectApiV5\Dto\AdGroup;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class AddRequest
{

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\AdGroup\AdGroupAddItem>")
     *
     * @var AdGroupAddItem $AdGroups
     */
    private $AdGroups;

    /**
     * @param AdGroupAddItem[] $AdGroups
     */
    public function __construct(array $AdGroups = null)
    {
      $this->AdGroups = $AdGroups;
    }

    /**
     * @return AdGroupAddItem[]
     */
    public function getAdGroups()
    {
      return $this->AdGroups;
    }

    /**
     * @param AdGroupAddItem[] $AdGroups
     * @return AddRequest
     */
    public function setAdGroups(array $AdGroups)
    {
      $this->AdGroups = $AdGroups;
      return $this;
    }

}
