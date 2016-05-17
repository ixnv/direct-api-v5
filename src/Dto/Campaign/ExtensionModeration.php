<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class ExtensionModeration
{

    /**
     * @JMS\Type("string")
     *
     * @var StatusEnum $Status
     */
    private $Status;

    /**
     * @JMS\Type("string")
     *
     * @var string $StatusClarification
     */
    private $StatusClarification;

    /**
     * @param StatusEnum $Status
     * @param string $StatusClarification
     */
    public function __construct($Status = null, $StatusClarification = null)
    {
      $this->Status = $Status;
      $this->StatusClarification = $StatusClarification;
    }

    /**
     * @return StatusEnum
     */
    public function getStatus()
    {
      return $this->Status;
    }

    /**
     * @param StatusEnum $Status
     * @return \eLama\DirectApiV5\Dto\Campaign\ExtensionModeration
     */
    public function setStatus($Status)
    {
      $this->Status = $Status;
      return $this;
    }

    /**
     * @return string
     */
    public function getStatusClarification()
    {
      return $this->StatusClarification;
    }

    /**
     * @param string $StatusClarification
     * @return \eLama\DirectApiV5\Dto\Campaign\ExtensionModeration
     */
    public function setStatusClarification($StatusClarification)
    {
      $this->StatusClarification = $StatusClarification;
      return $this;
    }

}
