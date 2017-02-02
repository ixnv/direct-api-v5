<?php

namespace eLama\DirectApiV5\Dto\AdGroup;

use eLama\DirectApiV5\Dto\AdGroup\Enum\DomainUrlProcessingStatusEnum;
use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class DynamicTextAdGroupGet
{

    /**
     * @JMS\Type("string")
     *
     * @var string $DomainUrl
     */
    private $DomainUrl;

    /**
     * @JMS\Type("string")
     *
     * @var DomainUrlProcessingStatusEnum $DomainUrlProcessingStatus
     */
    private $DomainUrlProcessingStatus;

    /**
     * @return string
     */
    public function getDomainUrl()
    {
      return $this->DomainUrl;
    }

    /**
     * @param string $DomainUrl
     * @return \eLama\DirectApiV5\Dto\AdGroup\DynamicTextAdGroupGet
     */
    public function setDomainUrl($DomainUrl = null)
    {
      $this->DomainUrl = $DomainUrl;
      return $this;
    }

    /**
     * @return DomainUrlProcessingStatusEnum
     */
    public function getDomainUrlProcessingStatus()
    {
      return $this->DomainUrlProcessingStatus;
    }

    /**
     * @param DomainUrlProcessingStatusEnum $DomainUrlProcessingStatus
     * @return \eLama\DirectApiV5\Dto\AdGroup\DynamicTextAdGroupGet
     */
    public function setDomainUrlProcessingStatus($DomainUrlProcessingStatus = null)
    {
      $this->DomainUrlProcessingStatus = $DomainUrlProcessingStatus;
      return $this;
    }

}
