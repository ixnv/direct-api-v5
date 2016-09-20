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
     * @return long[]
     */
    public function getCampaignIds()
    {
      return $this->CampaignIds;
    }

    /**
     * @param long[] $CampaignIds
     * @return \eLama\DirectApiV5\Dto\Bids\BidsSelectionCriteria
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
     * @return \eLama\DirectApiV5\Dto\Bids\BidsSelectionCriteria
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
     * @return \eLama\DirectApiV5\Dto\Bids\BidsSelectionCriteria
     */
    public function setKeywordIds(array $KeywordIds = null)
    {
      $this->KeywordIds = $KeywordIds;
      return $this;
    }

}
