<?php

namespace eLama\DirectApiV5\Dto\AudienceTarget;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class AudienceTargetGetItem extends AudienceTargetBase
{
    /**
     * @JMS\Type("integer")
     *
     * @var int $Id
     */
    protected $Id;

    /**
     * @JMS\Type("integer")
     *
     * @var int $AdGroupId
     */
    protected $AdGroupId;

    /**
     * @JMS\Type("integer")
     *
     * @var int $CampaignId
     */
    protected $CampaignId;

    /**
     * @JMS\Type("integer")
     *
     * @var int $RetargetingListId
     */
    protected $RetargetingListId;

    /**
     * @JMS\Type("integer")
     *
     * @var int $InterestId
     */
    protected $InterestId;

    /**
     * @JMS\Type("string")
     *
     * @var string $State
     */
    protected $State;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * @param int $Id
     * @return self
     */
    public function setId($Id)
    {
        $this->Id = $Id;
    
        return $this;
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
     * @return self
     */
    public function setAdGroupId($AdGroupId)
    {
        $this->AdGroupId = $AdGroupId;
    
        return $this;
    }

    /**
     * @return int
     */
    public function getCampaignId()
    {
        return $this->CampaignId;
    }

    /**
     * @param int $CampaignId
     * @return self
     */
    public function setCampaignId($CampaignId)
    {
        $this->CampaignId = $CampaignId;
    
        return $this;
    }

    /**
     * @return int
     */
    public function getRetargetingListId()
    {
        return $this->RetargetingListId;
    }

    /**
     * @param int $RetargetingListId
     * @return self
     */
    public function setRetargetingListId($RetargetingListId)
    {
        $this->RetargetingListId = $RetargetingListId;
    
        return $this;
    }

    /**
     * @return int
     */
    public function getInterestId()
    {
        return $this->InterestId;
    }

    /**
     * @param int $InterestId
     * @return self
     */
    public function setInterestId($InterestId)
    {
        $this->InterestId = $InterestId;
    
        return $this;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->State;
    }

    /**
     * @param string $State StateEnum
     * @return self
     */
    public function setState($State = null)
    {
        $this->State = $State;
    
        return $this;
    }
}
