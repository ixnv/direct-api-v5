<?php
declare(strict_types = 1);

namespace eLama\DirectApiV5\RequestBody;

use eLama\DirectApiV5\Dto\General\ResumeResponseBody;
use eLama\DirectApiV5\Dto\Keyword\ResumeRequest;

final class ResumeKeywordsRequestBody extends RequestBody
{
    /**
     * @var ResumeRequest
     */
    private $request;

    /**
     * @param ResumeRequest $request
     */
    public function __construct(ResumeRequest $request)
    {
        $this->request = $request;
    }

    /**
     * @return string
     */
    public function resource()
    {
        return 'keywords';
    }

    /**
     * @return string
     */
    public function resultClass()
    {
        return ResumeResponseBody::class;
    }

    /**
     * @return ResumeRequest
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
        return 'resume';
    }
}
