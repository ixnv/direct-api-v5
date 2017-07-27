<?php

namespace eLama\DirectApiV5\RequestBody;

use eLama\DirectApiV5\Dto\Ad\ArchiveRequest;
use eLama\DirectApiV5\Dto\General\ArchiveResponseBody;

class ArchiveAdsRequestBody extends RequestBody
{
    /**
     * @var \eLama\DirectApiV5\Dto\Ad\ArchiveRequest
     */
    private $request;

    /**
     * @param ArchiveRequest $request
     */
    public function __construct(ArchiveRequest $request)
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
        return ArchiveResponseBody::class;
    }

    /**
     * @return \eLama\DirectApiV5\Dto\Ad\ArchiveRequest
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
        return 'archive';
    }
}
