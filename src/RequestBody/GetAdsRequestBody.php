<?php


namespace eLama\DirectApiV5\RequestBody;

use eLama\DirectApiV5\Dto\Ad\AdFieldEnum;
use eLama\DirectApiV5\Dto\Ad\AdsSelectionCriteria;
use eLama\DirectApiV5\Dto\Ad\GetOperationResponse;
use eLama\DirectApiV5\Dto\Ad\GetRequest;
use eLama\DirectApiV5\Dto\Ad\TextAdFieldEnum;

class GetAdsRequestBody extends GetRequestBody
{

    public function __construct(AdsSelectionCriteria $selectionCriteria) {
        $this->request = new GetRequest(
            $selectionCriteria,
            AdFieldEnum::values(),
            TextAdFieldEnum::values()
        );
    }

    public function resource()
    {
        return 'ads';
    }

    /**
     * @return GetRequest
     */
    public function params()
    {
        return $this->request;
    }

    public function resultClass()
    {
        return GetOperationResponse::class;
    }
}
