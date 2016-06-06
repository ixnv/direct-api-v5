<?php

namespace eLama\DirectApiV5\RequestBody;

use eLama\DirectApiV5\Dto\Changes\CheckResponseBody;
use eLama\DirectApiV5\Dto\Changes\CheckRequest;

class CheckRequestBody extends RequestBody
{
    /** @var  CheckRequest */
    private $request;

    public function __construct(CheckRequest $request)
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
        return CheckResponseBody::class;
    }

    /**
     * @return CheckRequest
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
        return 'check';
    }
}
