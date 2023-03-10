<?php


namespace eLama\DirectApiV5\Dto\General;

use RuntimeException;

class SelectionCriteria
{
    const MAX_CAMPAIGN_IDS = 10;

    protected $CampaignIds = [];

    /**
     * @return int[]
     */
    public function getCampaignIds()
    {
        return $this->CampaignIds;
    }

    public function addCampaignId($campaignId)
    {
        if ($this->CampaignIds && count($this->CampaignIds) >= static::MAX_CAMPAIGN_IDS) {
            $this->throwCampaignsCountLimitException();
        }

        $this->CampaignIds[] = $campaignId;

        return $this;
    }

    /**
     * @param int[] $campaignIds
     * @return self
     */
    public function setCampaignIds(array $campaignIds = null)
    {
        if ($campaignIds && count($campaignIds) > static::MAX_CAMPAIGN_IDS) {
            $this->throwCampaignsCountLimitException();
        }

        $this->CampaignIds = $campaignIds;

        return $this;
    }

    /**
     * @throws RuntimeException
     */
    private function throwCampaignsCountLimitException()
    {
        throw new RuntimeException("Максимальное количество кампаний: " . self::MAX_CAMPAIGN_IDS);
    }
}
