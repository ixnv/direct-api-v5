<?php

namespace eLama\DirectApiV5\Dto\Bids;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class BidsSelectionCriteria
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
     * @return int[]
     */
    public function getCampaignIds()
    {
      return $this->CampaignIds;
    }

    /**
     * @param int[] $CampaignIds
     * @return \eLama\DirectApiV5\Dto\Bids\BidsSelectionCriteria
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
     * @return \eLama\DirectApiV5\Dto\Bids\BidsSelectionCriteria
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
     * @return \eLama\DirectApiV5\Dto\Bids\BidsSelectionCriteria
     */
    public function setKeywordIds(array $KeywordIds = null)
    {
      $this->KeywordIds = $KeywordIds;
      return $this;
    }

}
