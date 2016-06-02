<?php

namespace eLama\DirectApiV5\Dto\Changes;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class CheckResponseModified
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
     * @var int[] $AdIds
     */
    private $AdIds;

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Changes\CampaignStatItem>")
     *
     * @var CampaignStatItem[] $CampaignsStat
     */
    private $CampaignsStat;

    /**
     * @return int[]
     */
    public function getCampaignIds()
    {
      return $this->CampaignIds ?: [];
    }

    /**
     * @param int[] $CampaignIds
     * @return \eLama\DirectApiV5\Dto\Changes\CheckResponseModified
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
      return $this->AdGroupIds ?: [];
    }

    /**
     * @param int[] $AdGroupIds
     * @return \eLama\DirectApiV5\Dto\Changes\CheckResponseModified
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
      return $this->AdIds ?: [];
    }

    /**
     * @param int[] $AdIds
     * @return \eLama\DirectApiV5\Dto\Changes\CheckResponseModified
     */
    public function setAdIds(array $AdIds = null)
    {
      $this->AdIds = $AdIds;
      return $this;
    }

    /**
     * @return CampaignStatItem[]
     */
    public function getCampaignsStat()
    {
      return $this->CampaignsStat ?: [];
    }

    /**
     * @param CampaignStatItem[] $CampaignsStat
     * @return \eLama\DirectApiV5\Dto\Changes\CheckResponseModified
     */
    public function setCampaignsStat(array $CampaignsStat = null)
    {
      $this->CampaignsStat = $CampaignsStat;
      return $this;
    }

}
