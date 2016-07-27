<?php

namespace eLama\DirectApiV5\Service;

use eLama\DirectApiV5\Dto\Keyword\KeywordsSelectionCriteria;
use eLama\DirectApiV5\Dto\Keyword\KeywordStateEnum;
use eLama\DirectApiV5\Dto\Keyword\KeywordUpdateItem;
use eLama\DirectApiV5\Dto\Keyword\UpdateRequest;
use eLama\DirectApiV5\RequestBody\GetKeywordsRequestBody;
use eLama\DirectApiV5\RequestBody\UpdateKeywordRequestBody;
use GuzzleHttp\Promise\PromiseInterface;

class KeywordService extends Service
{
    /**
     * @param int[] $campaignIds
     * @param int|null $pageLimit
     * @return PromiseInterface
     * @see \eLama\DirectApiV5\Dto\Keyword\KeywordGetItem
     */
    public function getNonArchivedKeywords(array $campaignIds, $pageLimit = null)
    {
        \Assert\that($campaignIds)->notEmpty();

        $criteria = new KeywordsSelectionCriteria();
        $criteria->setCampaignIds($campaignIds);
        $criteria->setStates(
            [KeywordStateEnum::ON, KeywordStateEnum::SUSPENDED, KeywordStateEnum::OFF]
        );

        $getAdsParams = new GetKeywordsRequestBody($criteria);

        return $this->callGetCollectingItems($getAdsParams, $pageLimit);
    }

    /**
     * @param int[] $adGroupIds
     * @param int|null $pageLimit
     * @return PromiseInterface
     * @see \eLama\DirectApiV5\Dto\Keyword\KeywordGetItem
     */
    public function getNonArchivedKeywordsByAdGroupIds(array $adGroupIds, $pageLimit = null)
    {
        \Assert\that($adGroupIds)->notEmpty();

        $criteria = new KeywordsSelectionCriteria();
        $criteria->setAdGroupIds($adGroupIds);
        $criteria->setStates(
            [KeywordStateEnum::ON, KeywordStateEnum::SUSPENDED, KeywordStateEnum::OFF]
        );

        $getAdsParams = new GetKeywordsRequestBody($criteria);

        return $this->callGetCollectingItems($getAdsParams, $pageLimit);
    }

    /**
     * @param KeywordUpdateItem[] $items
     * @return PromiseInterface
     * @see UpdateResult
     */
    public function update(array $items)
    {
        \Assert\thatAll($items)->isInstanceOf(KeywordUpdateItem::class);

        $request = new UpdateKeywordRequestBody(
            new UpdateRequest($items)
        );

        return $this->driver->call($request);
    }
}
