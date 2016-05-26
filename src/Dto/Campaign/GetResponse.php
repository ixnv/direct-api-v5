<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Result\GetResultGeneral;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class GetResponse extends GetResultGeneral
{

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Campaign\CampaignGetItem>")
     *
     * @var CampaignGetItem[]
     */
    private $Campaigns;

    /**
     * @param CampaignGetItem[] $Campaigns
     */
    public function __construct(array $Campaigns = null)
    {
        $this->Campaigns = $Campaigns;
    }

    /**
     * @return CampaignGetItem[]
     */
    public function getCampaigns()
    {
        if ($this->Campaigns === null) {
            return [];
        }

        return $this->Campaigns;
    }

    /**
     * @param CampaignGetItem[] $Campaigns
     * @return GetResponseGeneral
     */
    public function setCampaigns(array $Campaigns)
    {
        $this->Campaigns = $Campaigns;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->getCampaigns();
    }
}
