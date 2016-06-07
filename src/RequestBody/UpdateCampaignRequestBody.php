<?php
namespace eLama\DirectApiV5\RequestBody;

use eLama\DirectApiV5\Dto\Campaign\UpdateRequest;
use eLama\DirectApiV5\Dto\General\UpdateResponseBody;

class UpdateCampaignRequestBody extends RequestBody
{
    /** @var UpdateRequest  */
    private $request;

    /**
     * @param UpdateRequest $request
     */
    public function __construct(UpdateRequest $request)
    {
        $this->request = $request;
    }

    /**
     * @return string
     */
    public function resource()
    {
        return 'campaigns';
    }

    /**
     * @return string
     */
    public function resultClass()
    {
        return UpdateResponseBody::class;
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
        return 'update';
    }
}
