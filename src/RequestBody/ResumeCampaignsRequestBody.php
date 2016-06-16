<?php

namespace eLama\DirectApiV5\RequestBody;

use eLama\DirectApiV5\Dto\Campaign\ResumeRequest;
use eLama\DirectApiV5\Dto\General\ResumeResponseBody;

class ResumeCampaignsRequestBody extends RequestBody
{
    /**
     * @var ResumeRequest
     */
    private $request;

    public function __construct(ResumeRequest $request)
    {
        $this->request = $request;
    }

    /**
     * @return string
     */
    public function resource()
    {
        return 'campaigns';
    }

    /**
     * @return string
     */
    public function resultClass()
    {
        return ResumeResponseBody::class;
    }

    /**
     * @return mixed
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
        return 'resume';
    }
}
