<?php


namespace eLama\DirectApiV5\RequestBody;

use eLama\DirectApiV5\Dto\Sitelink\GetResponseBody;
use eLama\DirectApiV5\Dto\General\IdsCriteria;
use eLama\DirectApiV5\Dto\Sitelink\GetRequest;
use eLama\DirectApiV5\Dto\Sitelink\Enum\SitelinksSetFieldEnum;

class GetSitelinkRequestBody extends GetRequestBody
{

    public function __construct(IdsCriteria $idsCriteria) {
        $this->request = new GetRequest(
            $idsCriteria,
            SitelinksSetFieldEnum::values()
        );
    }

    public function resource()
    {
        return 'sitelinks';
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
