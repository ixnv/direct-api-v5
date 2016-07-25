<?php

namespace eLama\DirectApiV5\Dto\Vcard;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class ApiExceptionMessage
{

    /**
     * @JMS\Type("string")
     *
     * @var string $requestId
     */
    private $requestId;

    /**
     * @JMS\Type("integer")
     *
     * @var int $errorCode
     */
    private $errorCode;

    /**
     * @JMS\Type("string")
     *
     * @var string $errorDetail
     */
    private $errorDetail;

    /**
     * @return string
     */
    public function getRequestId()
    {
        return $this->requestId;
    }

    /**
     * @param string $requestId
     * @return \eLama\DirectApiV5\Dto\Vcard\ApiExceptionMessage
     */
    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;

        return $this;
    }

    /**
     * @return int
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @param int $errorCode
     * @return \eLama\DirectApiV5\Dto\Vcard\ApiExceptionMessage
     */
    public function setErrorCode($errorCode)
    {
        $this->errorCode = $errorCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getErrorDetail()
    {
        return $this->errorDetail;
    }

    /**
     * @param string $errorDetail
     * @return \eLama\DirectApiV5\Dto\Vcard\ApiExceptionMessage
     */
    public function setErrorDetail($errorDetail)
    {
        $this->errorDetail = $errorDetail;

        return $this;
    }

}
