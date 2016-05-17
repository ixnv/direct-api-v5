<?php

namespace eLama\DirectApiV5\Dto\Ad;

use eLama\Advisor\Domain\Direct\Ad\SiteLinkAdInfo;
use eLama\Advisor\Domain\Direct\Ad\VCardInfo;
use eLama\DirectApiV5\Dto\General\StatusEnum;
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

    public function getSiteLinkAdInfo()
    {
        $statusMap = [
            StatusEnum::ACCEPTED => SiteLinkAdInfo::ACTIVE,
            StatusEnum::MODERATION => SiteLinkAdInfo::BEING_MODERATED,
        ];
        if ($this->getSitelinkSetId()) {
            $siteLinkStatus = $this->getSitelinksModeration()->getStatus();
            $domainStatus = $statusMap[$siteLinkStatus] ?? $siteLinkStatus;

            return SiteLinkAdInfo::withStatus($domainStatus);
        } else {
            return SiteLinkAdInfo::noSiteLink();
        }
    }

    public function getVCardInfo()
    {
        $statusMap = [
            StatusEnum::ACCEPTED => VCardInfo::ACTIVE,
            StatusEnum::MODERATION => VCardInfo::BEING_MODERATED,
        ];
        if ($this->getVCardId()) {
            $vCardStatus = $this->getVCardModeration()->getStatus();
            $domainStatus = $statusMap[$vCardStatus] ?? $vCardStatus;

            return VCardInfo::withStatus($domainStatus);
        } else {
            return VCardInfo::noVCard();
        }
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

}
