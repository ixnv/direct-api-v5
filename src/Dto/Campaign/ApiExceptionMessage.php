<?php

namespace eLama\DirectApiV5\Dto\Campaign;

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
     * @param string $requestId
     * @param int $errorCode
     * @param string $errorDetail
     */
    public function __construct($requestId = null, $errorCode = null, $errorDetail = null)
    {
      $this->requestId = $requestId;
      $this->errorCode = $errorCode;
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
     * @return \eLama\DirectApiV5\Dto\Campaign\ApiExceptionMessage
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
     * @return \eLama\DirectApiV5\Dto\Campaign\ApiExceptionMessage
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
     * @return \eLama\DirectApiV5\Dto\Campaign\ApiExceptionMessage
     */
    public function setErrorDetail($errorDetail)
    {
      $this->errorDetail = $errorDetail;
      return $this;
    }

}
