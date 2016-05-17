<?php

namespace eLama\DirectApiV5\Dto\General;

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
     * @return self
     */
    public function setRequestId($requestId = null)
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
     * @return self
     */
    public function setErrorCode($errorCode = null)
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
     * @return self
     */
    public function setErrorDetail($errorDetail = null)
    {
      $this->errorDetail = $errorDetail;
      return $this;
    }

}
