<?php

namespace eLama\DirectApiV5\Dto\AudienceTarget;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class AudienceTargetSelectionCriteria
{
    /**
     * @JMS\Type("array<int>")
     *
     * @var int[] $Ids
     */
    protected $Ids;

    /**
     * @JMS\Type("array<int>")
     *
     * @var int[] $AdGroupIds
     */
    protected $AdGroupIds;

    /**
     * @JMS\Type("array<int>")
     *
     * @var int[] $CampaignIds
     */
    protected $CampaignIds;

    /**
     * @JMS\Type("array<int>")
     *
     * @var int[] $RetargetingListIds
     */
    protected $RetargetingListIds;

    /**
     * @JMS\Type("array<int>")
     *
     * @var int[] $InterestIds
     */
    protected $InterestIds;

    /**
     * @JMS\Type("array<string>")
     *
     * @var string[] $States AudienceTargetStateEnum
     */
    protected $States;

    /**
     * @return int[]
     */
    public function getIds()
    {
        return $this->Ids;
    }

    /**
     * @param int[] $Ids
     * @return self
     */
    public function setIds(array $Ids = null)
    {
        $this->Ids = $Ids;
    
        return $this;
    }

    /**
     * @return int[]
     */
    public function getAdGroupIds()
    {
        return $this->AdGroupIds;
    }

    /**
     * @param int[] $AdGroupIds
     * @return self
     */
    public function setAdGroupIds(array $AdGroupIds = null)
    {
        $this->AdGroupIds = $AdGroupIds;
    
        return $this;
    }

    /**
     * @return int[]
     */
    public function getCampaignIds()
    {
        return $this->CampaignIds;
    }

    /**
     * @param int[] $CampaignIds
     * @return self
     */
    public function setCampaignIds(array $CampaignIds = null)
    {
        $this->CampaignIds = $CampaignIds;
    
        return $this;
    }

    /**
     * @return int[]
     */
    public function getRetargetingListIds()
    {
        return $this->RetargetingListIds;
    }

    /**
     * @param int[] $RetargetingListIds
     * @return self
     */
    public function setRetargetingListIds(array $RetargetingListIds = null)
    {
        $this->RetargetingListIds = $RetargetingListIds;
    
        return $this;
    }

    /**
     * @return int[]
     */
    public function getInterestIds()
    {
        return $this->InterestIds;
    }

    /**
     * @param int[] $InterestIds
     * @return self
     */
    public function setInterestIds(array $InterestIds = null)
    {
        $this->InterestIds = $InterestIds;
    
        return $this;
    }

    /**
     * @return string[] AudienceTargetStateEnum
     */
    public function getStates()
    {
        return $this->States;
    }

    /**
     * @param string[] $States AudienceTargetStateEnum
     * @return self
     */
    public function setStates(array $States = null)
    {
        $this->States = $States;
    
        return $this;
    }
}
