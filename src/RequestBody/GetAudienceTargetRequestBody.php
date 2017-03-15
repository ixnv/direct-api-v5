<?php

namespace eLama\DirectApiV5\RequestBody;

use eLama\DirectApiV5\Dto\AudienceTarget\AudienceTargetSelectionCriteria;
use eLama\DirectApiV5\Dto\AudienceTarget\Enum\AudienceTargetFieldEnum;
use eLama\DirectApiV5\Dto\AudienceTarget\GetRequest;
use eLama\DirectApiV5\Dto\AudienceTarget\GetResponseBody;
use eLama\DirectApiV5\Dto\General\LimitOffset;

class GetAudienceTargetRequestBody extends GetRequestBody
{
    public function __construct(
        AudienceTargetSelectionCriteria $selectionCriteria,
        LimitOffset $limitOffset = null
    ) {
        $this->request = new GetRequest(
            $selectionCriteria,
            AudienceTargetFieldEnum::values()
        );

        $this->request->setPage($limitOffset);
    }

    public function resource()
    {
        return 'audiencetargets';
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
