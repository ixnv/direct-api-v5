<?php

namespace eLama\DirectApiV5\Dto\Changes;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class CheckCampaignsResult
{

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Changes\CampaignChangesItem>")
     *
     * @var CampaignChangesItem[] $Campaigns
     */
    private $Campaigns;

    /**
     * @JMS\Type("string")
     *
     * @var string $Timestamp
     */
    private $Timestamp;

    /**
     * @param CampaignChangesItem[] $Campaigns
     * @param string $Timestamp
     */
    public function __construct(array $Campaigns = null, $Timestamp = null)
    {
        $this->Campaigns = $Campaigns;
        $this->Timestamp = $Timestamp;
    }

    /**
     * @return CampaignChangesItem[]
     */
    public function getCampaigns()
    {
        return $this->Campaigns ?: [];
    }

    /**
     * @param CampaignChangesItem[] $Campaigns
     * @return \eLama\DirectApiV5\Dto\Changes\CheckCampaignsResult
     */
    public function setCampaigns(array $Campaigns)
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
     * @return \eLama\DirectApiV5\Dto\Changes\CheckCampaignsResult
     */
    public function setTimestamp($Timestamp)
    {
        $this->Timestamp = $Timestamp;

        return $this;
    }

}
