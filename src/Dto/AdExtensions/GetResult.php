<?php

namespace eLama\DirectApiV5\Dto\AdExtensions;

use eLama\DirectApiV5\Dto\General\GetResultGeneral;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class GetResult extends GetResultGeneral
{
    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\AdExtensions\AdExtensionGetItem>")
     *
     * @var AdExtensionGetItem[] $AdGroups
     */
    private $AdExtensions = [];

    /**
     * @param AdExtensionGetItem[] $AdExtensions
     */
    public function __construct(array $AdExtensions)
    {
        $this->AdExtensions = $AdExtensions;
    }

    public function getItems()
    {
        return $this->AdExtensions;
    }

    /**
     * @return AdExtensionGetItem[]
     */
    public function getAdExtensions()
    {
        return $this->AdExtensions;
    }

    /**
     * @param AdExtensionGetItem[] $AdExtensions
     */
    public function setAdExtensions($AdExtensions)
    {
        $this->AdExtensions = $AdExtensions;
    }
}
