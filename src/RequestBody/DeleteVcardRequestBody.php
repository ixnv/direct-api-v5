<?php

namespace eLama\DirectApiV5\RequestBody;

use eLama\DirectApiV5\Dto\Vcard\DeleteRequest;
use eLama\DirectApiV5\Dto\General\DeleteResponseBody;

class DeleteVcardRequestBody extends RequestBody
{
    /**
     * @var DeleteRequest
     */
    private $request;

    public function __construct(DeleteRequest $request)
    {
        $this->request = $request;
    }

    /**
     * @return string
     */
    public function resource()
    {
        return 'vcards';
    }

    /**
     * @return string
     */
    public function resultClass()
    {
        return DeleteResponseBody::class;
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
        return 'delete';
    }
}
