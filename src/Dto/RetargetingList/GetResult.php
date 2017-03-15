<?php

namespace eLama\DirectApiV5\Dto\RetargetingList;

use eLama\DirectApiV5\Dto\General\GetResultGeneral;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class GetResult extends GetResultGeneral
{
    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\RetargetingList\RetargetingListGetItem>")
     *
     * @var RetargetingListGetItem[]
     */
    private $RetargetingLists;

    /**
     * @param RetargetingListGetItem[] $Campaigns
     */
    public function __construct(array $AudienceTargets = null)
    {
        $this->RetargetingLists = $AudienceTargets;
    }

    /**
     * @return RetargetingListGetItem[]
     */
    public function getRetargetingLists()
    {
        if ($this->RetargetingLists === null) {
            return [];
        }

        return $this->RetargetingLists;
    }

    /**
     * @param RetargetingListGetItem[] $Campaigns
     * @return self
     */
    public function setRetargetingLists(array $RetargetingLists)
    {
        $this->RetargetingLists = $RetargetingLists;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->getRetargetingLists();
    }
}
