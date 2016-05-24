<?php


namespace eLama\DirectApiV5\Params;

use eLama\DirectApiV5\Dto\Ad\AdFieldEnum;
use eLama\DirectApiV5\Dto\Ad\AdsSelectionCriteria;
use eLama\DirectApiV5\Dto\Ad\GetOperationResponse;
use eLama\DirectApiV5\Dto\Ad\GetRequest;
use eLama\DirectApiV5\Dto\Ad\TextAdFieldEnum;

class GetAdsParams extends GetParams
{
    /** @var GetRequest */
    private $request;

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
