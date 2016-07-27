<?php

namespace eLama\DirectApiV5\RequestBody;

use eLama\DirectApiV5\Dto\Keyword\UpdateRequest;
use eLama\DirectApiV5\Dto\General\UpdateResponseBody;

class UpdateKeywordRequestBody extends RequestBody
{
    /** @var UpdateRequest */
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
        return 'keywords';
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
