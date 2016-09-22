<?php

namespace eLama\DirectApiV5\RequestBody;

use eLama\DirectApiV5\Dto\Bids\SetRequest;
use eLama\DirectApiV5\Dto\General\AddResponseBody;

class SetBidsRequestBody extends RequestBody
{
    /**
     * @var AddRequest
     */
    private $request;

    public function __construct(SetRequest $request)
    {
        $this->request = $request;
    }

    /**
     * @return string
     */
    public function resource()
    {
        return 'bids';
    }

    /**
     * @return string
     */
    public function resultClass()
    {
        return AddResponseBody::class;
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
        return 'set';
    }
}
