<?php

namespace eLama\DirectApiV5\Dto\KeywordBids;

use eLama\DirectApiV5\Dto\Keywordbids\Enum\ServingStatusEnum;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class KeywordBidsSelectionCriteria
{
    /**
     * @JMS\Type("array<integer>")
     *
     * @var int[] $CampaignIds
     */
    private $CampaignIds;

    /**
     * @JMS\Type("array<integer>")
     *
     * @var int[] $AdGroupIds
     */
    private $AdGroupIds;

    /**
     * @JMS\Type("array<integer>")
     *
     * @var int[] $KeywordIds
     */
    private $KeywordIds;

    /**
     * @JMS\Type("array<string>")
     *
     * @var ServingStatusEnum[] $ServingStatuses
     */
    private $ServingStatuses;

    /**
     * @return int[]
     */
    public function getCampaignIds()
    {
      return $this->CampaignIds;
    }

    /**
     * @param int[] $CampaignIds
     * @return \eLama\DirectApiV5\Dto\Keywordbids\KeywordBidsSelectionCriteria
     */
    public function setCampaignIds(array $CampaignIds = null)
    {
      $this->CampaignIds = $CampaignIds;
      
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
     * @return \eLama\DirectApiV5\Dto\Keywordbids\KeywordBidsSelectionCriteria
     */
    public function setAdGroupIds(array $AdGroupIds = null)
    {
      $this->AdGroupIds = $AdGroupIds;
      
      return $this;
    }

    /**
     * @return int[]
     */
    public function getKeywordIds()
    {
      return $this->KeywordIds;
    }

    /**
     * @param int[] $KeywordIds
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
