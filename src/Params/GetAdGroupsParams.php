<?php


namespace eLama\DirectApiV5\Params;

use eLama\DirectApiV5\Dto\AdGroup\AdGroupFieldEnum;
use eLama\DirectApiV5\Dto\AdGroup\AdGroupsSelectionCriteria;
use eLama\DirectApiV5\Dto\AdGroup\GetOperationResponse;
use eLama\DirectApiV5\Dto\AdGroup\GetRequest;

class GetAdGroupsParams extends GetParams
{
    /** @var GetRequest */
    protected $request;

    public function __construct(AdGroupsSelectionCriteria $selectionCriteria) {
        $this->request = new GetRequest(
            $selectionCriteria,
            AdGroupFieldEnum::values()
        );
    }

    public function resource()
    {
        return 'adgroups';
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
