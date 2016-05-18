<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Result\GetResult as GetResultGeneral;

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
     * @param CampaignGetItem $Campaigns
     */
    public function __construct(CampaignGetItem $Campaigns = null)
    {
      $this->Campaigns = $Campaigns;
    }

    /**
     * @return CampaignGetItem[]
     */
    public function getCampaigns()
    {
      return $this->Campaigns;
    }

    /**
     * @param CampaignGetItem[] $Campaigns
     * @return \eLama\DirectApiV5\Dto\Campaign\GetResult
     */
    public function setCampaigns(array $Campaigns)
    {
      $this->Campaigns = $Campaigns;
      return $this;
    }

}
