<?php


namespace eLama\DirectApiV5\Params;

use eLama\DirectApiV5\Dto\Campaign\CampaignFieldEnum;
use eLama\DirectApiV5\Dto\Campaign\CampaignsSelectionCriteria;
use eLama\DirectApiV5\Dto\Campaign\GetOperationResponse;
use eLama\DirectApiV5\Dto\Campaign\GetRequest;
use eLama\DirectApiV5\Dto\Campaign\TextCampaignFieldEnum;
use eLama\DirectApiV5\Dto\General\LimitOffset;

class GetCampaignsParams extends GetParams
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
        return GetOperationResponse::class;
    }
}
