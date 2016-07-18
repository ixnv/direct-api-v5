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
    /**
     * @param int $id
     * @return PromiseInterface
     * @see \eLama\DirectApiV5\Dto\Campaign\CampaignGetItem
     */
    public function getCampaign($id)
    {
        $criteria = new CampaignsSelectionCriteria();
        $criteria->setIds([$id]);

        $getCampaignsRequest = new GetCampaignsRequestBody($criteria);

        return $this->driver->call($getCampaignsRequest)
            ->then(function (Response $response) {
                return $response->getUnserializedBody()->getResult()->getCampaigns()[0];
            });
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

        $getCampaignsRequest = new GetCampaignsRequestBody($criteria);

        return $this->callGetCollectingItems($getCampaignsRequest, $pageLimit);
    }
}
