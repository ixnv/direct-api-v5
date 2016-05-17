<?php


namespace eLama\DirectApiV5\RequestResponse;

use eLama\DirectApiV5\Dto\Campaign\CampaignFieldEnum;
use eLama\DirectApiV5\Dto\Campaign\CampaignsSelectionCriteria;
use eLama\DirectApiV5\Dto\Campaign\GetOperationResponse;
use eLama\DirectApiV5\Dto\Campaign\GetRequest;
use eLama\DirectApiV5\Dto\Campaign\TextCampaignFieldEnum;

class GetCampaignsRequest extends GetRequestGeneral
{
    /** @var GetRequest */
    protected $request;

    public function __construct(
        CampaignsSelectionCriteria $selectionCriteria
    ) {
        $this->request = new GetRequest(
            $selectionCriteria,
            CampaignFieldEnum::values(),
            TextCampaignFieldEnum::values()
        );
    }

    public function resource()
    {
        return 'campaigns';
    }

    protected function params()
    {
        return $this->request;
    }

    public function resultClass()
    {
        return GetOperationResponse::class;
    }
}
