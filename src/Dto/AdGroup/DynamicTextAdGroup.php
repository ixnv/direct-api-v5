<?php

namespace eLama\DirectApiV5\Dto\AdGroup;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class DynamicTextAdGroup
{

    /**
     * @JMS\Type("string")
     *
     * @var string $DomainUrl
     */
    private $DomainUrl;

    /**
     * @param string $DomainUrl
     */
    public function __construct($DomainUrl)
    {
      $this->DomainUrl = $DomainUrl;
    }

    /**
     * @return string
     */
    public function getDomainUrl()
    {
      return $this->DomainUrl;
    }

    /**
     * @param string $DomainUrl
     * @return \eLama\DirectApiV5\Dto\AdGroup\DynamicTextAdGroup
     */
    public function setDomainUrl($DomainUrl)
    {
      $this->DomainUrl = $DomainUrl;
      return $this;
    }

}
