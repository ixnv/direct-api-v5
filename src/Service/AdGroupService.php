<?php

namespace eLama\DirectApiV5\Service;

use eLama\DirectApiV5\Dto\AdGroup\AdGroupsSelectionCriteria;
use eLama\DirectApiV5\Dto\AdGroup\AdGroupTypesEnum;
use eLama\DirectApiV5\RequestBody\GetAdGroupsRequestBody;
use GuzzleHttp\Promise\PromiseInterface;

class AdGroupService extends Service
{
    /**
     * Получить незаархивированные текстовые объявления
     *
     * @param int[] $campaignIds
     * @param int|null $pageLimit
     * @return PromiseInterface
     * @see \eLama\DirectApiV5\Dto\Ad\AdGetItem
     */
    public function getAllTextAdGroups(array $campaignIds, $pageLimit = null)
    {
        //Проблема API - не удается получить все объявления не передавая ID кампании
        \Assert\that($campaignIds)->notEmpty()->all()->min(1);

        $criteria = new AdGroupsSelectionCriteria();
        $criteria->setCampaignIds($campaignIds);
        $criteria->setTypes([AdGroupTypesEnum::TEXT_AD_GROUP]);

        $getAdsParams = new GetAdGroupsRequestBody($criteria);

        return $this->callGetCollectingItems($getAdsParams, $pageLimit);
    }
}
