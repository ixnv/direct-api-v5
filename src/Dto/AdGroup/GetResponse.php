<?php

namespace eLama\DirectApiV5\Dto\AdGroup;

use eLama\DirectApiV5\Dto\General\GetResponseGeneral;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class GetResponse extends GetResponseGeneral
{

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\AdGroup\AdGroupGetItem>")
     *
     * @var AdGroupGetItem[] $AdGroups
     */
    private $AdGroups = [];

    /**
     * @param AdGroupGetItem[] $AdGroups
     */
    public function __construct(array $AdGroups = null)
    {
        if (!$AdGroups) {
            $AdGroups = [];
        }

        $this->AdGroups = $AdGroups;
    }

    /**
     * @return AdGroupGetItem[]
     */
    public function getAdGroups()
    {
      return $this->AdGroups;
    }

    /**
     * @param AdGroupGetItem[] $AdGroups
     * @return self
     */
    public function setAdGroups(array $AdGroups)
    {
      $this->AdGroups = $AdGroups;
      return $this;
    }
}
