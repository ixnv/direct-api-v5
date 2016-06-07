<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class UpdateRequest
{
    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Campaign\CampaignUpdateItem>")
     *
     * @var CampaignUpdateItem[] $Campaigns
     */
    private $Campaigns;

    /**
     * @param CampaignUpdateItem[] $Campaigns
     */
    public function __construct(array $Campaigns)
    {
        $this->Campaigns = $Campaigns;
    }

    /**
     * @return CampaignUpdateItem[]
     */
    public function getCampaigns()
    {
        return $this->Campaigns ?: [];
    }

    /**
     * @param CampaignUpdateItem[] $Campaigns
     * @return \eLama\DirectApiV5\Dto\Campaign\UpdateRequest
     */
    public function setCampaigns(array $Campaigns)
    {
        $this->Campaigns = $Campaigns;

        return $this;
    }

}
