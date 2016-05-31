<?php

namespace eLama\DirectApiV5\Params;

use eLama\DirectApiV5\Dto\Changes\CheckRequest;
use eLama\DirectApiV5\Dto\Changes\CheckResponse;

class CheckParams extends Params
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
        return CheckResponse::class;
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
