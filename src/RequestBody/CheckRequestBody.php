<?php

namespace eLama\DirectApiV5\RequestBody;

use eLama\DirectApiV5\Dto\Changes\CheckOperationResponse;
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
        return CheckOperationResponse::class;
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
