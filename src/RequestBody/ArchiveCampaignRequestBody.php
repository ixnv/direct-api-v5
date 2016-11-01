<?php

namespace eLama\DirectApiV5\RequestBody;

use eLama\DirectApiV5\Dto\Campaign\ArchiveRequest;
use eLama\DirectApiV5\Dto\General\ArchiveResponseBody;
use eLama\DirectApiV5\Dto\General\IdsCriteria;

class ArchiveCampaignRequestBody extends RequestBody
{
    /**
     * @var ArchiveRequest
     */
    private $request;

    /**
     * @param int[] $ids
     */
    public function __construct(array $ids)
    {
        $this->request = new ArchiveRequest(new IdsCriteria($ids));
    }

    public function resource()
    {
        return 'campaigns';
    }

    public function resultClass()
    {
        return ArchiveResponseBody::class;
    }

    public function params()
    {
        return $this->request;
    }

    public function method()
    {
        return 'archive';
    }
}
