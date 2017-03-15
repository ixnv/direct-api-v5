<?php

namespace eLama\DirectApiV5\Dto\RetargetingList;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class RetargetingListRuleArgumentItem
{
    /**
     * @JMS\Type("integer")
     *
     * @var int $MembershipLifeSpan
     */
    protected $MembershipLifeSpan;

    /**
     * @JMS\Type("integer")
     *
     * @var int $ExternalId
     */
    protected $ExternalId;

    /**
     * @param int $externalId
     */
    public function __construct($externalId)
    {
        $this->ExternalId = $externalId;
    }

    /**
     * @return int
     */
    public function getMembershipLifeSpan()
    {
        return $this->MembershipLifeSpan;
    }

    /**
     * @param int $MembershipLifeSpan
     * @return self
     */
    public function setMembershipLifeSpan($MembershipLifeSpan)
    {
        $this->MembershipLifeSpan = $MembershipLifeSpan;
    
        return $this;
    }

    /**
     * @return int
     */
    public function getExternalId()
    {
        return $this->ExternalId;
    }

    /**
     * @param int $ExternalId
     * @return self
     */
    public function setExternalId($ExternalId)
    {
        $this->ExternalId = $ExternalId;
    
        return $this;
    }
}
