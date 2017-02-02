<?php

namespace eLama\DirectApiV5\Dto\Ad;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class TextAdGetBase
{

    /**
     * @JMS\Type("integer")
     *
     * @var int $VCardId
     */
    private $VCardId;

    /**
     * @JMS\Type("string")
     *
     * @var string $AdImageHash
     */
    private $AdImageHash;

    /**
     * @JMS\Type("integer")
     *
     * @var int $SitelinkSetId
     */
    private $SitelinkSetId;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Ad\ExtensionModeration")
     *
     * @var ExtensionModeration $VCardModeration
     */
    private $VCardModeration;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Ad\ExtensionModeration")
     *
     * @var ExtensionModeration $SitelinksModeration
     */
    private $SitelinksModeration;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Ad\ExtensionModeration")
     *
     * @var ExtensionModeration $AdImageModeration
     */
    private $AdImageModeration;

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Ad\AdExtensionAdGetItem>")
     *
     * @var AdExtensionAdGetItem[] $AdExtensions
     */
    private $AdExtensions;

    /**
     * @return int
     */
    public function getVCardId()
    {
      return $this->VCardId;
    }

    /**
     * @param int $VCardId
     * @return \eLama\DirectApiV5\Dto\Ad\TextAdGetBase
     */
    public function setVCardId($VCardId = null)
    {
      $this->VCardId = $VCardId;
      return $this;
    }

    /**
     * @return string
     */
    public function getAdImageHash()
    {
      return $this->AdImageHash;
    }

    /**
     * @param string $AdImageHash
     * @return \eLama\DirectApiV5\Dto\Ad\TextAdGetBase
     */
    public function setAdImageHash($AdImageHash = null)
    {
      $this->AdImageHash = $AdImageHash;
      return $this;
    }

    /**
     * @return int
     */
    public function getSitelinkSetId()
    {
      return $this->SitelinkSetId;
    }

    /**
     * @param int $SitelinkSetId
     * @return \eLama\DirectApiV5\Dto\Ad\TextAdGetBase
     */
    public function setSitelinkSetId($SitelinkSetId = null)
    {
      $this->SitelinkSetId = $SitelinkSetId;
      return $this;
    }

    /**
     * @return ExtensionModeration
     */
    public function getVCardModeration()
    {
      return $this->VCardModeration;
    }

    /**
     * @param ExtensionModeration $VCardModeration
     * @return \eLama\DirectApiV5\Dto\Ad\TextAdGetBase
     */
    public function setVCardModeration(ExtensionModeration $VCardModeration = null)
    {
      $this->VCardModeration = $VCardModeration;
      return $this;
    }

    /**
     * @return ExtensionModeration
     */
    public function getSitelinksModeration()
    {
      return $this->SitelinksModeration;
    }

    /**
     * @param ExtensionModeration $SitelinksModeration
     * @return \eLama\DirectApiV5\Dto\Ad\TextAdGetBase
     */
    public function setSitelinksModeration(ExtensionModeration $SitelinksModeration = null)
    {
      $this->SitelinksModeration = $SitelinksModeration;
      return $this;
    }

    /**
     * @return ExtensionModeration
     */
    public function getAdImageModeration()
    {
      return $this->AdImageModeration;
    }

    /**
     * @param ExtensionModeration $AdImageModeration
     * @return \eLama\DirectApiV5\Dto\Ad\TextAdGetBase
     */
    public function setAdImageModeration(ExtensionModeration $AdImageModeration = null)
    {
      $this->AdImageModeration = $AdImageModeration;
      return $this;
    }

    /**
     * @return AdExtensionAdGetItem[]
     */
    public function getAdExtensions()
    {
        return $this->AdExtensions;
    }

    /**
     * @param AdExtensionAdGetItem[] $AdExtensions
     * @return \eLama\DirectApiV5\Dto\Ad\TextAdGetBase
     */
    public function setAdExtensions(array $AdExtensions = null)
    {
        $this->AdExtensions = $AdExtensions;
        return $this;
    }
}
