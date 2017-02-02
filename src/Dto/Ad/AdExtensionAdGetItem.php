<?php

namespace eLama\DirectApiV5\Dto\Ad;

use eLama\DirectApiV5\Dto\General\Enum\AdExtensionTypeEnum;
use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class AdExtensionAdGetItem
{

    /**
     * @JMS\Type("integer")
     *
     * @var int $AdExtensionId
     */
    private $AdExtensionId;

    /**
     * @JMS\Type("string")
     *
     * @var AdExtensionTypeEnum $Type
     */
    private $Type;

    /**
     * @param int $AdExtensionId
     * @param AdExtensionTypeEnum $Type
     */
    public function __construct($AdExtensionId = null, $Type = null)
    {
      $this->AdExtensionId = $AdExtensionId;
      $this->Type = $Type;
    }

    /**
     * @return int
     */
    public function getAdExtensionId()
    {
      return $this->AdExtensionId;
    }

    /**
     * @param int $AdExtensionId
     * @return \eLama\DirectApiV5\Dto\Ad\AdExtensionAdGetItem
     */
    public function setAdExtensionId($AdExtensionId)
    {
      $this->AdExtensionId = $AdExtensionId;
      return $this;
    }

    /**
     * @return AdExtensionTypeEnum
     */
    public function getType()
    {
      return $this->Type;
    }

    /**
     * @param AdExtensionTypeEnum $Type
     * @return \eLama\DirectApiV5\Dto\Ad\AdExtensionAdGetItem
     */
    public function setType($Type)
    {
      $this->Type = $Type;
      return $this;
    }

}
