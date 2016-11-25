<?php


namespace eLama\DirectApiV5\RequestBody;

use eLama\DirectApiV5\Dto\Client\Enum\ClientFieldEnum;
use eLama\DirectApiV5\Dto\Client\GetRequest;
use eLama\DirectApiV5\Dto\Client\GetResponseBody;
use eLama\DirectApiV5\Dto\General\LimitOffset;

class GetClientsRequestBody extends GetRequestBody
{
    public function __construct() {
        $this->request = new GetRequest(
            ClientFieldEnum::values()
        );
    }

    public function resource()
    {
        return 'clients';
    }

    public function params()
    {
        return $this->request;
    }

    public function resultClass()
    {
        return GetResponseBody::class;
    }
}
