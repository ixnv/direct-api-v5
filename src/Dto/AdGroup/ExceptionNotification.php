<?php

namespace eLama\DirectApiV5\Dto\AdGroup;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class ExceptionNotification
{

    /**
     * @JMS\Type("integer")
     *
     * @var int $Code
     */
    private $Code;

    /**
     * @JMS\Type("string")
     *
     * @var string $Message
     */
    private $Message;

    /**
     * @JMS\Type("string")
     *
     * @var string $Details
     */
    private $Details;

    /**
     * @deprecated
     * @see General\ExceptionNotification
     * @param int $Code
     * @param string $Message
     * @param string $Details
     */
    public function __construct($Code = null, $Message = null, $Details = null)
    {
        $this->Code = $Code;
        $this->Message = $Message;
        $this->Details = $Details;
    }

    /**
     * @return int
     */
    public function getCode()
    {
      return $this->Code;
    }

    /**
     * @param int $Code
     * @return \eLama\DirectApiV5\Dto\AdGroup\ExceptionNotification
     */
    public function setCode($Code)
    {
      $this->Code = $Code;
      return $this;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
      return $this->Message;
    }

    /**
     * @param string $Message
     * @return \eLama\DirectApiV5\Dto\AdGroup\ExceptionNotification
     */
    public function setMessage($Message)
    {
      $this->Message = $Message;
      return $this;
    }

    /**
     * @return string
     */
    public function getDetails()
    {
      return $this->Details;
    }

    /**
     * @param string $Details
     * @return \eLama\DirectApiV5\Dto\AdGroup\ExceptionNotification
     */
    public function setDetails($Details)
    {
      $this->Details = $Details;
      return $this;
    }

}
