<?php

namespace eLama\DirectApiV5;

use eLama\DirectApiV5\Dto\General\Error;

class ErrorException extends \Exception
{
    /** @var string */
    private $requestId;

    /** @var string */
    private $detail;

    /** @var string */
    private $request;

    /** @var string */
    private $response;

    public static function throwFromError(Error $error, Request $request, Response $response) {
        $result = new ErrorException($error->getErrorString(), $error->getErrorCode());
        $result->requestId = $error->getRequestId();
        $result->detail = $error->getErrorDetail();
        $result->request = $request->withSanitizedToken();
        $result->response = $response;
        throw $result;
    }

    /**
     * @return string
     */
    public function getRequestId()
    {
        return $this->requestId;
    }

    /**
     * @return string
     */
    public function getDetail()
    {
        return $this->detail;
    }
}
