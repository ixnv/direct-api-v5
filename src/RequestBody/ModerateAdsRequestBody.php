<?php

namespace eLama\DirectApiV5\RequestBody;

use eLama\DirectApiV5\Dto\Ad\ModerateRequest;
use eLama\DirectApiV5\Dto\Ad\ModerateResponseBody;
use eLama\DirectApiV5\Dto\General\IdsCriteria;

class ModerateAdsRequestBody extends RequestBody
{
    /**
     * @var ModerateRequest
     */
    private $request;


    public function __construct(IdsCriteria $selectionCriteria)
    {
        $this->request = new ModerateRequest($selectionCriteria);
    }

    public function resource()
    {
        return 'ads';
    }

    public function resultClass()
    {
        return ModerateResponseBody::class;
    }

    public function params()
    {
        return $this->request;
    }

    public function method()
    {
        return 'moderate';
    }
}
