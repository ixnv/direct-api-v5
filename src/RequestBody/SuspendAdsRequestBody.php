<?php

namespace eLama\DirectApiV5\RequestBody;

use eLama\DirectApiV5\Dto\Ad\SuspendRequest;
use eLama\DirectApiV5\Dto\General\SuspendResponseBody;

class SuspendAdsRequestBody extends RequestBody
{
    /**
     * @var SuspendRequest
     */
    private $request;

    /**
     * @param SuspendRequest $request
     */
    public function __construct(SuspendRequest $request)
    {
        $this->request = $request;
    }

    /**
     * @return string
     */
    public function resource()
    {
        return 'ads';
    }

    /**
     * @return string
     */
    public function resultClass()
    {
        return SuspendResponseBody::class;
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
        return 'suspend';
    }
}
