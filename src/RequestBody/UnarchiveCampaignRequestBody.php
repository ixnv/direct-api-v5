<?php

namespace eLama\DirectApiV5\RequestBody;

use eLama\DirectApiV5\Dto\Campaign\UnarchiveRequest;
use eLama\DirectApiV5\Dto\General\UnarchiveResponseBody;
use eLama\DirectApiV5\Dto\General\IdsCriteria;

class UnarchiveCampaignRequestBody extends RequestBody
{
    /**
     * @var UnarchiveRequest
     */
    private $request;

    /**
     * @param int[] $ids
     */
    public function __construct(array $ids)
    {
        $this->request = new UnarchiveRequest(new IdsCriteria($ids));
    }

    public function resource()
    {
        return 'campaigns';
    }

    public function resultClass()
    {
        return UnarchiveResponseBody::class;
    }

    public function params()
    {
        return $this->request;
    }

    public function method()
    {
        return 'unarchive';
    }
}
