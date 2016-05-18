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
        //TODO Обрезать токен
        $result->request = $request;
        $result->response = $response;
        throw $result;
    }
}
