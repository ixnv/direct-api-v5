<?php

namespace eLama\DirectApiV5\RequestBody;

use eLama\DirectApiV5\Dto\Ad\AddRequest;
use eLama\DirectApiV5\Dto\General\AddResponseBody;

class AddAdRequestBody extends RequestBody
{
    /**
     * @var AddRequest
     */
    private $request;

    public function __construct(AddRequest $request)
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
        return 'add';
    }
}
