<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class AddRequest
{

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Campaign\CampaignAddItem>")
     *
     * @var CampaignAddItem[] $Campaigns
     */
    private $Campaigns;

    /**
     * @param CampaignAddItem[] $Campaigns
     */
    public function __construct(array $Campaigns = null)
    {
      $this->Campaigns = $Campaigns;
    }

    /**
     * @return CampaignAddItem[]
     */
    public function getCampaigns()
    {
      return $this->Campaigns ?: [];
    }

    /**
     * @param CampaignAddItem[] $Campaigns
     * @return \eLama\DirectApiV5\Dto\Campaign\AddRequest
     */
    public function setCampaigns(array $Campaigns)
    {
      $this->Campaigns = $Campaigns;
      return $this;
    }

}
