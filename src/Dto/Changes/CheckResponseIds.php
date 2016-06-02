<?php

namespace eLama\DirectApiV5\Dto\Changes;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class CheckResponseIds
{

    /**
     * @JMS\Type("array<integer>")
     *
     * @var int[] $CampaignIds
     */
    private $CampaignIds = [];

    /**
     * @JMS\Type("array<integer>")
     *
     * @var int[] $AdGroupIds
     */
    private $AdGroupIds = [];

    /**
     * @JMS\Type("array<integer>")
     *
     * @var int[] $AdIds
     */
    private $AdIds = [];

    public static function createEmpty()
    {
        return new self();
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
     * @return \eLama\DirectApiV5\Dto\Changes\CheckResponseIds
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
     * @return \eLama\DirectApiV5\Dto\Changes\CheckResponseIds
     */
    public function setAdGroupIds(array $AdGroupIds = null)
    {
      $this->AdGroupIds = $AdGroupIds;
      return $this;
    }

    /**
     * @return int[]
     */
    public function getAdIds()
    {
      return $this->AdIds;
    }

    /**
     * @param int[] $AdIds
     * @return \eLama\DirectApiV5\Dto\Changes\CheckResponseIds
     */
    public function setAdIds(array $AdIds = null)
    {
      $this->AdIds = $AdIds;
      return $this;
    }

}
