<?php

namespace eLama\DirectApiV5\RequestBody;

use eLama\DirectApiV5\Dto\General\DeleteRequest;
use eLama\DirectApiV5\Dto\General\DeleteResponseBody;

class DeleteAdExtensionRequestBody extends RequestBody
{
    /**
     * @var DeleteRequest
     */
    private $request;

    public function __construct(DeleteRequest $request)
    {
        $this->request = $request;
    }

    public function resource()
    {
        return 'adextensions';
    }

    public function resultClass()
    {
        return DeleteResponseBody::class;
    }

    public function params()
    {
        return $this->request;
    }

    public function method()
    {
        return 'delete';
    }
}
