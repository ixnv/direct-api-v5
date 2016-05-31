<?php

namespace eLama\DirectApiV5\Dto\Changes;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class CheckCampaignsResponse
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Changes\CampaignChangesItem")
     *
     * @var CampaignChangesItem $Campaigns
     */
    private $Campaigns;

    /**
     * @JMS\Type("string")
     *
     * @var string $Timestamp
     */
    private $Timestamp;

    /**
     * @param CampaignChangesItem $Campaigns
     * @param string $Timestamp
     */
    public function __construct(CampaignChangesItem $Campaigns = null, $Timestamp = null)
    {
      $this->Campaigns = $Campaigns;
      $this->Timestamp = $Timestamp;
    }

    /**
     * @return CampaignChangesItem
     */
    public function getCampaigns()
    {
      return $this->Campaigns;
    }

    /**
     * @param CampaignChangesItem $Campaigns
     * @return \eLama\DirectApiV5\Dto\Changes\CheckCampaignsResponse
     */
    public function setCampaigns(CampaignChangesItem $Campaigns)
    {
      $this->Campaigns = $Campaigns;
      return $this;
    }

    /**
     * @return string
     */
    public function getTimestamp()
    {
      return $this->Timestamp;
    }

    /**
     * @param string $Timestamp
     * @return \eLama\DirectApiV5\Dto\Changes\CheckCampaignsResponse
     */
    public function setTimestamp($Timestamp)
    {
      $this->Timestamp = $Timestamp;
      return $this;
    }

}
