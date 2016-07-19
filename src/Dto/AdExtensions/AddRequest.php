<?php

namespace eLama\DirectApiV5\Dto\AdExtensions;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class AddRequest
{

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\AdExtensions\AdExtensionAddItem>")
     *
     * @var AdExtensionAddItem[] $AdExtensions
     */
    private $AdExtensions;

    /**
     * @param AdExtensionAddItem[] $AdExtensions
     */
    public function __construct(array $AdExtensions)
    {
      $this->AdExtensions = $AdExtensions;
    }

    /**
     * @return AdExtensionAddItem[]
     */
    public function getAdExtensions()
    {
      return $this->AdExtensions;
    }

    /**
     * @param AdExtensionAddItem[] $AdExtensions
     * @return AddRequest
     */
    public function setAdExtensions(array $AdExtensions)
    {
      $this->AdExtensions = $AdExtensions;
      return $this;
    }

}
