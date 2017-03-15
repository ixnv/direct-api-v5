<?php

namespace eLama\DirectApiV5\Dto\AudienceTarget;

use eLama\DirectApiV5\Dto\General\GetResultGeneral;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class GetResult extends GetResultGeneral
{
    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\AudienceTarget\AudienceTargetGetItem>")
     *
     * @var AudienceTargetGetItem[]
     */
    private $AudienceTargets;

    /**
     * @param AudienceTargetGetItem[] $Campaigns
     */
    public function __construct(array $AudienceTargets = null)
    {
        $this->AudienceTargets = $AudienceTargets;
    }

    /**
     * @return AudienceTargetGetItem[]
     */
    public function getAudienceTargets()
    {
        if ($this->AudienceTargets === null) {
            return [];
        }

        return $this->AudienceTargets;
    }

    /**
     * @param AudienceTargetGetItem[] $Campaigns
     * @return self
     */
    public function setAudienceTargets(array $AudienceTargets)
    {
        $this->AudienceTargets = $AudienceTargets;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->getAudienceTargets();
    }
}
