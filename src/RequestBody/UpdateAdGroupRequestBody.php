<?php

namespace eLama\DirectApiV5\RequestBody;

use eLama\DirectApiV5\Dto\AdGroup\UpdateRequest;
use eLama\DirectApiV5\Dto\General\UpdateResponseBody;

class UpdateAdGroupRequestBody extends RequestBody
{
    /**
     * @var UpdateRequest
     */
    private $request;

    public function __construct(UpdateRequest $request)
    {
        $this->request = $request;
    }

    /**
     * @return string
     */
    public function resource()
    {
        return 'adgroups';
    }

    /**
     * @return string
     */
    public function resultClass()
    {
        return UpdateResponseBody::class;
    }

    /**
     * @return UpdateRequest
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
        return 'update';
    }
}
