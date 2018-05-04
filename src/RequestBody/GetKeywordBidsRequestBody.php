<?php

namespace eLama\DirectApiV5\RequestBody;

use eLama\DirectApiV5\Dto\KeywordBids\Enum\KeywordBidFieldEnum;
use eLama\DirectApiV5\Dto\KeywordBids\Enum\KeywordBidNetworkFieldEnum;
use eLama\DirectApiV5\Dto\KeywordBids\Enum\KeywordBidSearchFieldEnum;
use eLama\DirectApiV5\Dto\KeywordBids\KeywordBidsSelectionCriteria;
use eLama\DirectApiV5\Dto\KeywordBids\GetRequest;
use eLama\DirectApiV5\Dto\KeywordBids\GetResponseBody;

class GetKeywordBidsRequestBody extends GetRequestBody
{
    /**
     * @param KeywordBidsSelectionCriteria $selectionCriteria
     */
    public function __construct(KeywordBidsSelectionCriteria $selectionCriteria)
    {
        $this->request = new GetRequest(
            $selectionCriteria,
            KeywordBidFieldEnum::values(),
            KeywordBidSearchFieldEnum::values(),
            KeywordBidNetworkFieldEnum::values()
        );
    }

    /**
     * @return string
     */
    public function resource()
    {
        return 'keywordbids';
    }

    /**
     * @return GetRequest
     */
    public function params()
    {
        return $this->request;
    }

    /**
     * @return mixed
     */
    public function resultClass()
    {
        return GetResponseBody::class;
    }
}
