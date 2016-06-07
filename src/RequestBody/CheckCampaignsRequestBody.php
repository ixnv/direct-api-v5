<?php

namespace eLama\DirectApiV5\RequestBody;

use eLama\DirectApiV5\Dto\Changes\CheckCampaignsRequest;
use eLama\DirectApiV5\Dto\Changes\CheckCampaignsResponseBody;

class CheckCampaignsRequestBody extends RequestBody
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
        return CheckCampaignsResponseBody::class;
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
