<?php

namespace eLama\DirectApiV5\RequestBody;

use eLama\DirectApiV5\Dto\AdExtensions\AdExtensionFieldEnum;
use eLama\DirectApiV5\Dto\AdExtensions\AdExtensionsSelectionCriteria;
use eLama\DirectApiV5\Dto\AdExtensions\CalloutFieldEnum;
use eLama\DirectApiV5\Dto\AdExtensions\GetRequest;
use eLama\DirectApiV5\Dto\AdExtensions\GetResponseBody;

class GetAdExtensionRequestBody extends RequestBody
{
    /**
     * @var GetRequest
     */
    protected $request;

    public function __construct(AdExtensionsSelectionCriteria $selectionCriteria)
    {
        $this->request = new GetRequest(
            $selectionCriteria,
            AdExtensionFieldEnum::values(),
            CalloutFieldEnum::values()
        );
    }

    public function resource()
    {
        return 'adextensions';
    }

    public function resultClass()
    {
        return GetResponseBody::class;
    }

    public function params()
    {
        return $this->request;
    }

    public function method()
    {
        return 'get';
    }
}
