<?php

namespace eLama\DirectApiV5\RequestBody;

use eLama\DirectApiV5\Dto\AgencyClient\UpdateRequest;
use eLama\DirectApiV5\Dto\General\UpdateResponseBody;

class UpdateAgencyClientRequestBody extends RequestBody
{
    /**
     * @var UpdateRequest
     */
    private $request;

    /**
     * @param UpdateRequest $request
     */
    public function __construct(UpdateRequest $request)
    {
        $this->request = $request;
    }

    /**
     * @return string
     */
    public function resource()
    {
        return 'agencyclients';
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
