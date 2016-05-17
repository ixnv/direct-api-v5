<?php


namespace eLama\DirectApiV5\RequestResponse;

use eLama\DirectApiV5\Dto\AdGroup\AdGroupFieldEnum;
use eLama\DirectApiV5\Dto\AdGroup\GetOperationResponse;
use eLama\DirectApiV5\Dto\AdGroup\GetRequest;
use eLama\DirectApiV5\Dto\AdGroup\AdGroupsSelectionCriteria;

class GetAdGroupsRequest extends GetRequestGeneral
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
    protected function params()
    {
        return $this->request;
    }

    public function resultClass()
    {
        return GetOperationResponse::class;
    }
}
