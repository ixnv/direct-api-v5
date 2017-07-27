<?php

namespace eLama\DirectApiV5\RequestBody;

use eLama\DirectApiV5\Dto\Ad\UnarchiveRequest;
use eLama\DirectApiV5\Dto\General\UnarchiveResponseBody;

class UnarchiveAdsRequestBody extends RequestBody
{
    /**
     * @var \eLama\DirectApiV5\Dto\Ad\UnarchiveRequest
     */
    private $request;

    /**
     * @param UnarchiveRequest $request
     */
    public function __construct(UnarchiveRequest $request)
    {
        $this->request = $request;
    }

    /**
     * @return string
     */
    public function resource()
    {
        return 'ads';
    }

    /**
     * @return string
     */
    public function resultClass()
    {
        return UnarchiveResponseBody::class;
    }

    /**
     * @return \eLama\DirectApiV5\Dto\Ad\UnarchiveRequest
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
        return 'unarchive';
    }
}
