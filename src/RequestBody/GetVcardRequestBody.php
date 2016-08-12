<?php


namespace eLama\DirectApiV5\RequestBody;

use eLama\DirectApiV5\Dto\Vcard\GetResponseBody;
use eLama\DirectApiV5\Dto\General\IdsCriteria;
use eLama\DirectApiV5\Dto\Vcard\GetRequest;
use eLama\DirectApiV5\Dto\Vcard\VCardFieldEnum;

class GetVcardRequestBody extends GetRequestBody
{
    public function __construct(IdsCriteria $idsCriteria)
    {
        $this->request = new GetRequest(
            $idsCriteria,
            VCardFieldEnum::values()
        );
    }

    public function resource()
    {
        return 'vcards';
    }

    /**
     * @return GetRequest
     */
    public function params()
    {
        return $this->request;
    }

    public function resultClass()
    {
        return GetResponseBody::class;
    }
}
