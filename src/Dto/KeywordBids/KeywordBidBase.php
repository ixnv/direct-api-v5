<?php

namespace eLama\DirectApiV5\Dto\KeywordBids;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class KeywordBidBase
{
    /**
     * @JMS\Type("integer")
     *
     * @var int $CampaignId
     */
    private $CampaignId;

    /**
     * @JMS\Type("integer")
     *
     * @var int $AdGroupId
     */
    private $AdGroupId;

    /**
     * @JMS\Type("integer")
     *
     * @var int $KeywordId
     */
    private $KeywordId;

    /**
     * @return int
     */
    public function getCampaignId()
    {
      return $this->CampaignId;
    }

    /**
     * @param int $CampaignId
     * @return \eLama\DirectApiV5\Dto\Keywordbids\KeywordBidBase
     */
    public function setCampaignId($CampaignId = null)
    {
      $this->CampaignId = $CampaignId;

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
     * @return \eLama\DirectApiV5\Dto\Keywordbids\KeywordBidBase
     */
    public function setAdGroupId($AdGroupId = null)
    {
      $this->AdGroupId = $AdGroupId;

      return $this;
    }

    /**
     * @return int
     */
    public function getKeywordId()
    {
      return $this->KeywordId;
    }

    /**
     * @param int $KeywordId
     * @return \eLama\DirectApiV5\Dto\Keywordbids\KeywordBidBase
     */
    public function setKeywordId($KeywordId = null)
    {
      $this->KeywordId = $KeywordId;

      return $this;
    }
}
