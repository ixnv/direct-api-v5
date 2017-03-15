<?php


namespace eLama\DirectApiV5\RequestBody;

use eLama\DirectApiV5\Dto\General\LimitOffset;
use eLama\DirectApiV5\Dto\RetargetingList\Enum\RetargetingListFieldEnum;
use eLama\DirectApiV5\Dto\RetargetingList\GetRequest;
use eLama\DirectApiV5\Dto\RetargetingList\GetResponseBody;
use eLama\DirectApiV5\Dto\RetargetingList\RetargetingListSelectionCriteria;

class GetRetargetingListRequestBody extends GetRequestBody
{
    public function __construct(
        RetargetingListSelectionCriteria $selectionCriteria,
        LimitOffset $limitOffset = null
    ) {
        $this->request = new GetRequest(
            $selectionCriteria,
            RetargetingListFieldEnum::values()
        );

        $this->request->setPage($limitOffset);
    }

    public function resource()
    {
        return 'retargetinglists';
    }

    public function params()
    {
        return $this->request;
    }

    public function resultClass()
    {
        return GetResponseBody::class;
    }
}
