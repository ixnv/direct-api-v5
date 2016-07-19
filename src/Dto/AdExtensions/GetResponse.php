<?php

namespace eLama\DirectApiV5\Dto\AdExtensions;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class GetResponse
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\AdExtensions\AdExtensionGetItem")
     *
     * @var AdExtensionGetItem $AdExtensions
     */
    private $AdExtensions;

    /**
     * @param AdExtensionGetItem $AdExtensions
     */
    public function __construct(AdExtensionGetItem $AdExtensions = null)
    {
      $this->AdExtensions = $AdExtensions;
    }

    /**
     * @return AdExtensionGetItem
     */
    public function getAdExtensions()
    {
      return $this->AdExtensions;
    }

    /**
     * @param AdExtensionGetItem $AdExtensions
     * @return \eLama\DirectApiV5\Dto\AdExtensions\GetResponse
     */
    public function setAdExtensions(AdExtensionGetItem $AdExtensions)
    {
      $this->AdExtensions = $AdExtensions;
      return $this;
    }

}
