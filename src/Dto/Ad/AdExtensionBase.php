<?php

namespace eLama\DirectApiV5\Dto\Ad;

use eLama\DirectApiV5\Dto\General\Enum\AdExtensionTypeEnum;
use eLama\DirectApiV5\Dto\General\Enum\StateEnum;
use eLama\DirectApiV5\Dto\General\Enum\StatusEnum;
use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class AdExtensionBase
{

    /**
     * @JMS\Type("string")
     *
     * @var AdExtensionTypeEnum $Type
     */
    private $Type;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Ad\Callout")
     *
     * @var Callout $Callout
     */
    private $Callout;

    /**
     * @JMS\Type("string")
     *
     * @var StateEnum $State
     */
    private $State;

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
     * @return AdExtensionTypeEnum
     */
    public function getType()
    {
      return $this->Type;
    }

    /**
     * @param AdExtensionTypeEnum $Type
     * @return \eLama\DirectApiV5\Dto\Ad\AdExtensionBase
     */
    public function setType($Type = null)
    {
      $this->Type = $Type;
      return $this;
    }

    /**
     * @return Callout
     */
    public function getCallout()
    {
      return $this->Callout;
    }

    /**
     * @param Callout $Callout
     * @return \eLama\DirectApiV5\Dto\Ad\AdExtensionBase
     */
    public function setCallout(Callout $Callout = null)
    {
      $this->Callout = $Callout;
      return $this;
    }

    /**
     * @return StateEnum
     */
    public function getState()
    {
      return $this->State;
    }

    /**
     * @param StateEnum $State
     * @return \eLama\DirectApiV5\Dto\Ad\AdExtensionBase
     */
    public function setState($State = null)
    {
      $this->State = $State;
      return $this;
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
     * @return \eLama\DirectApiV5\Dto\Ad\AdExtensionBase
     */
    public function setStatus($Status = null)
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
     * @return \eLama\DirectApiV5\Dto\Ad\AdExtensionBase
     */
    public function setStatusClarification($StatusClarification = null)
    {
      $this->StatusClarification = $StatusClarification;
      return $this;
    }

}
