<?php

namespace eLama\DirectApiV5\Dto\AdExtensions;

use eLama\DirectApiV5\Dto\General\Enum\OperationEnum;
use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class AdExtensionSettingItem
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
     * @var OperationEnum $Operation
     */
    private $Operation;

    /**
     * @param int $AdExtensionId
     * @param OperationEnum $Operation
     */
    public function __construct($AdExtensionId = null, $Operation = null)
    {
      $this->AdExtensionId = $AdExtensionId;
      $this->Operation = $Operation;
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
     * @return \eLama\DirectApiV5\Dto\AdExtensions\AdExtensionSettingItem
     */
    public function setAdExtensionId($AdExtensionId)
    {
      $this->AdExtensionId = $AdExtensionId;
      return $this;
    }

    /**
     * @return OperationEnum
     */
    public function getOperation()
    {
      return $this->Operation;
    }

    /**
     * @param OperationEnum $Operation
     * @return \eLama\DirectApiV5\Dto\AdExtensions\AdExtensionSettingItem
     */
    public function setOperation($Operation)
    {
      $this->Operation = $Operation;
      return $this;
    }

}
