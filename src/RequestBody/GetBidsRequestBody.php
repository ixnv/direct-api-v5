<?php


namespace eLama\DirectApiV5\RequestBody;

use eLama\DirectApiV5\Dto\Bids\BidFieldEnum;
use eLama\DirectApiV5\Dto\Bids\BidsSelectionCriteria;
use eLama\DirectApiV5\Dto\Bids\GetRequest;
use eLama\DirectApiV5\Dto\Bids\GetResponseBody;

class GetBidsRequestBody extends GetRequestBody
{
    /**
     * @param BidsSelectionCriteria $selectionCriteria
     */
    public function __construct(BidsSelectionCriteria $selectionCriteria)
    {
        $this->request = new GetRequest(
            $selectionCriteria,
            BidFieldEnum::values()
        );
    }

    /**
     * @return string
     */
    public function resource()
    {
        return 'bids';
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
