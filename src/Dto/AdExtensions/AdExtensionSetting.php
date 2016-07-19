<?php

namespace eLama\DirectApiV5\Dto\AdExtensions;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class AdExtensionSetting
{

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\AdExtensions\AdExtensionSettingItem>")
     *
     * @var AdExtensionSettingItem[] $AdExtensions
     */
    private $AdExtensions;

    /**
     * @param AdExtensionSettingItem[] $AdExtensions
     */
    public function __construct(array $AdExtensions = null)
    {
      $this->AdExtensions = $AdExtensions;
    }

    /**
     * @return AdExtensionSettingItem[]
     */
    public function getAdExtensions()
    {
      return $this->AdExtensions;
    }

    /**
     * @param AdExtensionSettingItem[] $AdExtensions
     * @return \eLama\DirectApiV5\Dto\AdExtensions\AdExtensionSetting
     */
    public function setAdExtensions(array $AdExtensions)
    {
      $this->AdExtensions = $AdExtensions;
      return $this;
    }

}
