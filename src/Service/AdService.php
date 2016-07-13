<?php

namespace eLama\DirectApiV5\Service;

use eLama\DirectApiV5\Dto\Ad\AdsSelectionCriteria;
use eLama\DirectApiV5\Dto\Ad\AdTypeEnum;
use eLama\DirectApiV5\Dto\Ad\AdUpdateItem;
use eLama\DirectApiV5\Dto\Ad\UpdateRequest;
use eLama\DirectApiV5\Dto\General\StateEnum;
use eLama\DirectApiV5\Dto\General\StatusEnum;
use eLama\DirectApiV5\RequestBody\GetAdsRequestBody;
use eLama\DirectApiV5\RequestBody\UpdateAdRequestBody;
use GuzzleHttp\Promise\PromiseInterface;

class AdService extends Service
{
    /**
     * Получить незаархивированные текстовые объявления
     * @param int[] $campaignIds
     * @param bool $acceptedOrOnModeration
     * @param int|null $pageLimit
     * @return PromiseInterface
     * @see \eLama\DirectApiV5\Dto\Ad\AdGetItem
     */
    public function getNonArchivedAds(array $campaignIds, $acceptedOrOnModeration = false, $pageLimit = null)
    {
        \Assert\that($campaignIds)->notEmpty();

        $criteria = new AdsSelectionCriteria();
        $criteria->setCampaignIds($campaignIds);
        $criteria->setStates(
            [StateEnum::ON, StateEnum::OFF_BY_MONITORING, StateEnum::SUSPENDED, StateEnum::OFF]
        );

        if ($acceptedOrOnModeration) {
            $criteria->setStatuses(
                [StatusEnum::MODERATION, StatusEnum::PREACCEPTED, StatusEnum::ACCEPTED]
            );
        }

        $criteria->setTypes([AdTypeEnum::TEXT_AD]);

        $getAdsParams = new GetAdsRequestBody($criteria);

        return $this->callGetCollectingItems($getAdsParams, $pageLimit);
    }

    /**
     * @param AdUpdateItem[] $ads
     * @return PromiseInterface
     * @see UpdateResult
     */
    public function updateAds(array $ads)
    {
        \Assert\thatAll($ads)->isInstanceOf(AdUpdateItem::class);

        $request = new UpdateAdRequestBody(
            new UpdateRequest($ads)
        );

        return $this->driver->call($request);
    }
}
