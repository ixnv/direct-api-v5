<?php

namespace eLama\DirectApiV5\Service;

use eLama\DirectApiV5\Dto\Keyword\KeywordsSelectionCriteria;
use eLama\DirectApiV5\Dto\Keyword\KeywordStateEnum;
use eLama\DirectApiV5\RequestBody\GetKeywordsRequestBody;
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
}
