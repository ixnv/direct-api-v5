<?php


namespace eLama\DirectApiV5\Dto\General;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class Error
{
    /**
     * @JMS\Type("string")
     * @JMS\SerializedName(value="error_string")
     *
     * @var string
     */
    private $errorString;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName(value="error_code")
     *
     * @var string
     */
    private $errorCode;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName(value="error_detail")
     *
     * @var string
     */
    private $errorDetail;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName(value="request_id")
     *
     * @var string
     */
    private $requestId;

    /**
     * @return string
     */
    public function getErrorString()
    {
        return $this->errorString;
    }

    /**
     * @param string $errorString
     */
    public function setErrorString($errorString)
    {
        $this->errorString = $errorString;
    }

    /**
     * @return string
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @param string $errorCode
     */
    public function setErrorCode($errorCode)
    {
        $this->errorCode = $errorCode;
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
     */
    public function setErrorDetail($errorDetail)
    {
        $this->errorDetail = $errorDetail;
    }

    /**
     * @return string
     */
    public function getRequestId()
    {
        return $this->requestId;
    }

    /**
     * @param string $requestId
     */
    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;
    }
}
