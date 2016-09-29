<?php


namespace eLama\DirectApiV5\RequestBody;

use eLama\DirectApiV5\Dto\Campaign\CampaignsSelectionCriteria;
use eLama\DirectApiV5\Dto\Campaign\Enum\CampaignFieldEnum;
use eLama\DirectApiV5\Dto\Campaign\Enum\TextCampaignFieldEnum;
use eLama\DirectApiV5\Dto\Campaign\GetResponseBody;
use eLama\DirectApiV5\Dto\Campaign\GetRequest;
use eLama\DirectApiV5\Dto\General\LimitOffset;

class GetCampaignsRequestBody extends GetRequestBody
{
    public function __construct(
        CampaignsSelectionCriteria $selectionCriteria,
        LimitOffset $limitOffset = null
    ) {
        $this->request = new GetRequest(
            $selectionCriteria,
            CampaignFieldEnum::values(),
            TextCampaignFieldEnum::values()
        );

        $this->request->setPage($limitOffset);
    }

    public function resource()
    {
        return 'campaigns';
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
