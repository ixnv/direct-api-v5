<?php

namespace eLama\DirectApiV5\Params;

use eLama\DirectApiV5\Dto\Changes\CheckCampaignsRequest;
use eLama\DirectApiV5\Dto\Changes\CheckCampaignsResponse;

class CheckCampaignsParams extends Params
{

    /** @var  CheckCampaignsRequest */
    private $request;

    public function __construct(CheckCampaignsRequest $request)
    {
        $this->request = $request;
    }

    /**
     * @return string
     */
    public function resource()
    {
        return 'changes';
    }

    /**
     * @return string
     */
    public function resultClass()
    {
        return CheckCampaignsResponse::class;
    }

    /**
     * @return CheckCampaignsRequest
     */
    public function params()
    {
        return $this->request;
    }

    /**
     * @return string
     */
    public function method()
    {
        return 'checkCampaigns';
    }
}
