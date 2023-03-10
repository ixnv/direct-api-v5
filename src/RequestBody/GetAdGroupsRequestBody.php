<?php


namespace eLama\DirectApiV5\RequestBody;

use eLama\DirectApiV5\Dto\AdGroup\Enum\AdGroupFieldEnum;
use eLama\DirectApiV5\Dto\AdGroup\AdGroupsSelectionCriteria;
use eLama\DirectApiV5\Dto\AdGroup\GetResponseBody;
use eLama\DirectApiV5\Dto\AdGroup\GetRequest;

class GetAdGroupsRequestBody extends GetRequestBody
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
        return GetResponseBody::class;
    }
}
