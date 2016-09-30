<?php

namespace eLama\DirectApiV5\RequestBody;

use eLama\DirectApiV5\Dto\Bids\SetRequest;
use eLama\DirectApiV5\Dto\General\SetResponseBody;

class SetBidsRequestBody extends RequestBody
{
    /**
     * @var SetRequest
     */
    private $request;

    /**
     * @param SetRequest $request
     */
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
        return SetResponseBody::class;
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
