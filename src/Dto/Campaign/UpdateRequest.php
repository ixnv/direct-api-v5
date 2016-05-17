<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class UpdateRequest
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\CampaignUpdateItem")
     *
     * @var CampaignUpdateItem $Campaigns
     */
    private $Campaigns;

    /**
     * @param CampaignUpdateItem $Campaigns
     */
    public function __construct(CampaignUpdateItem $Campaigns = null)
    {
      $this->Campaigns = $Campaigns;
    }

    /**
     * @return CampaignUpdateItem
     */
    public function getCampaigns()
    {
      return $this->Campaigns;
    }

    /**
     * @param CampaignUpdateItem $Campaigns
     * @return \eLama\DirectApiV5\Dto\Campaign\UpdateRequest
     */
    public function setCampaigns(CampaignUpdateItem $Campaigns)
    {
      $this->Campaigns = $Campaigns;
      return $this;
    }

}
