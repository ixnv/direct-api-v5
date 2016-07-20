<?php

namespace eLama\DirectApiV5\Service;

use eLama\DirectApiV5\Dto\Campaign\CampaignsSelectionCriteria;
use eLama\DirectApiV5\Dto\Campaign\CampaignStateEnum;
use eLama\DirectApiV5\Dto\Campaign\CampaignTypeEnum;
use eLama\DirectApiV5\RequestBody\GetCampaignsRequestBody;
use eLama\DirectApiV5\Response;
use GuzzleHttp\Promise\PromiseInterface;

class CampaignService extends Service
{
    public function getCampaigns(CampaignsSelectionCriteria $criteria, $pageLimit = null)
    {
        $request = new GetCampaignsRequestBody($criteria);

        return $this->callGetCollectingItems($request, $pageLimit);
    }
    /**
     * @param int $id
     * @return PromiseInterface
     * @see \eLama\DirectApiV5\Dto\Campaign\CampaignGetItem
     */
    public function getCampaign($id)
    {
        $criteria = new CampaignsSelectionCriteria();
        $criteria->setIds([$id]);

        return $this->getCampaigns($criteria, $pageLimit = 1);
    }

    /**
     * Получить незаархивированные текстовые кампании
     * @param int|null $pageLimit
     * @return PromiseInterface
     * @see \eLama\DirectApiV5\Dto\Campaign\CampaignGetItem[]
     */
    public function getNonArchivedCampaigns($pageLimit = null)
    {
        $criteria = new CampaignsSelectionCriteria();
        $criteria->setStates(
            [CampaignStateEnum::ON, CampaignStateEnum::ENDED, CampaignStateEnum::SUSPENDED, CampaignStateEnum::OFF]
        );
        $criteria->setTypes([CampaignTypeEnum::TEXT_CAMPAIGN]);

        return $this->getCampaigns($criteria, $pageLimit);
    }
}
