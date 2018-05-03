<?php

namespace eLama\DirectApiV5\Dto\Keywordbids;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class KeywordBidsSelectionCriteria
{

    /**
     * @JMS\Type("array<integer>")
     *
     * @var long[] $CampaignIds
     */
    private $CampaignIds;

    /**
     * @JMS\Type("array<integer>")
     *
     * @var long[] $AdGroupIds
     */
    private $AdGroupIds;

    /**
     * @JMS\Type("array<integer>")
     *
     * @var long[] $KeywordIds
     */
    private $KeywordIds;

    /**
     * @JMS\Type("array<string>")
     *
     * @var ServingStatusEnum[] $ServingStatuses
     */
    private $ServingStatuses;

    /**
     * @return long[]
     */
    public function getCampaignIds()
    {
      return $this->CampaignIds;
    }

    /**
     * @param long[] $CampaignIds
     * @return \eLama\DirectApiV5\Dto\Keywordbids\KeywordBidsSelectionCriteria
     */
    public function setCampaignIds(array $CampaignIds = null)
    {
      $this->CampaignIds = $CampaignIds;
      return $this;
    }

    /**
     * @return long[]
     */
    public function getAdGroupIds()
    {
      return $this->AdGroupIds;
    }

    /**
     * @param long[] $AdGroupIds
     * @return \eLama\DirectApiV5\Dto\Keywordbids\KeywordBidsSelectionCriteria
     */
    public function setAdGroupIds(array $AdGroupIds = null)
    {
      $this->AdGroupIds = $AdGroupIds;
      return $this;
    }

    /**
     * @return long[]
     */
    public function getKeywordIds()
    {
      return $this->KeywordIds;
    }

    /**
     * @param long[] $KeywordIds
     * @return \eLama\DirectApiV5\Dto\Keywordbids\KeywordBidsSelectionCriteria
     */
    public function setKeywordIds(array $KeywordIds = null)
    {
      $this->KeywordIds = $KeywordIds;
      return $this;
    }

    /**
     * @return ServingStatusEnum[]
     */
    public function getServingStatuses()
    {
      return $this->ServingStatuses;
    }

    /**
     * @param ServingStatusEnum[] $ServingStatuses
     * @return \eLama\DirectApiV5\Dto\Keywordbids\KeywordBidsSelectionCriteria
     */
    public function setServingStatuses(array $ServingStatuses = null)
    {
      $this->ServingStatuses = $ServingStatuses;
      return $this;
    }

}
