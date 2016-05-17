<?php

namespace eLama\DirectApiV5\Dto\Ad;

use eLama\Advisor\Domain\Direct\Ad\Ad;
use eLama\Advisor\Domain\Direct\Ad\AdMedia;
use eLama\DirectApiV5\Dto\General\StateEnum;
use eLama\DirectApiV5\Dto\General\StatusEnum;
use JMS\Serializer\Annotation as JMS;
use League\Uri\Schemes\Http;

/**
 * @JMS\AccessType("public_method")
 */
class AdGetItem
{
    /**
     * @JMS\Type("integer")
     *
     * @var int $Id
     */
    private $Id;

    /**
     * @JMS\Type("integer")
     *
     * @var int $CampaignId
     */
    private $CampaignId;

    /**
     * @JMS\Type("integer")
     *
     * @var int $AdGroupId
     */
    private $AdGroupId;

    /**
     * @JMS\Type("string")
     *
     * @var StatusEnum $Status
     */
    private $Status;

    /**
     * @JMS\Type("string")
     *
     * @var StateEnum $State
     */
    private $State;

    /**
     * @JMS\Type("string")
     *
     * @var string $StatusClarification
     */
    private $StatusClarification;

    /**
     * @JMS\Type("string")
     *
     * @var ArrayOfAdCategoryEnum $AdCategories
     */
    private $AdCategories;

    /**
     * @JMS\Type("string")
     *
     * @var AgeLabelEnum $AgeLabel
     */
    private $AgeLabel;

    /**
     * @JMS\Type("string")
     *
     * @var AdTypeEnum $Type
     */
    private $Type;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Ad\TextAdGet")
     *
     * @var TextAdGet $TextAd
     */
    private $TextAd;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Ad\DynamicTextAdGet")
     *
     * @var DynamicTextAdGet $DynamicTextAd
     */
    private $DynamicTextAd;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Ad\MobileAppAdGet")
     *
     * @var MobileAppAdGet $MobileAppAd
     */
    private $MobileAppAd;

    /**
     * @return int
     */
    public function getId()
    {
      return $this->Id;
    }

    /**
     * @param int $Id
     * @return \eLama\DirectApiV5\Dto\Ad\AdGetItem
     */
    public function setId($Id = null)
    {
      $this->Id = $Id;
      return $this;
    }

    /**
     * @return int
     */
    public function getCampaignId()
    {
      return $this->CampaignId;
    }

    /**
     * @param int $CampaignId
     * @return \eLama\DirectApiV5\Dto\Ad\AdGetItem
     */
    public function setCampaignId($CampaignId = null)
    {
      $this->CampaignId = $CampaignId;
      return $this;
    }

    /**
     * @return int
     */
    public function getAdGroupId()
    {
      return $this->AdGroupId;
    }

    /**
     * @param int $AdGroupId
     * @return \eLama\DirectApiV5\Dto\Ad\AdGetItem
     */
    public function setAdGroupId($AdGroupId = null)
    {
      $this->AdGroupId = $AdGroupId;
      return $this;
    }

    /**
     * @return StatusEnum
     */
    public function getStatus()
    {
      return $this->Status;
    }

    /**
     * @param StatusEnum $Status
     * @return \eLama\DirectApiV5\Dto\Ad\AdGetItem
     */
    public function setStatus($Status = null)
    {
      $this->Status = $Status;
      return $this;
    }

    /**
     * @return StateEnum
     */
    public function getState()
    {
      return $this->State;
    }

    /**
     * @param StateEnum $State
     * @return \eLama\DirectApiV5\Dto\Ad\AdGetItem
     */
    public function setState($State = null)
    {
      $this->State = $State;
      return $this;
    }

    /**
     * @return string
     */
    public function getStatusClarification()
    {
      return $this->StatusClarification;
    }

    /**
     * @param string $StatusClarification
     * @return \eLama\DirectApiV5\Dto\Ad\AdGetItem
     */
    public function setStatusClarification($StatusClarification = null)
    {
      $this->StatusClarification = $StatusClarification;
      return $this;
    }

    /**
     * @return ArrayOfAdCategoryEnum
     */
    public function getAdCategories()
    {
      return $this->AdCategories;
    }

    /**
     * @param ArrayOfAdCategoryEnum $AdCategories
     * @return \eLama\DirectApiV5\Dto\Ad\AdGetItem
     */
    public function setAdCategories($AdCategories = null)
    {
      $this->AdCategories = $AdCategories;
      return $this;
    }

    /**
     * @return AgeLabelEnum
     */
    public function getAgeLabel()
    {
      return $this->AgeLabel;
    }

    /**
     * @param AgeLabelEnum $AgeLabel
     * @return \eLama\DirectApiV5\Dto\Ad\AdGetItem
     */
    public function setAgeLabel($AgeLabel = null)
    {
      $this->AgeLabel = $AgeLabel;
      return $this;
    }

    /**
     * @return AdTypeEnum
     */
    public function getType()
    {
      return $this->Type;
    }

    /**
     * @param AdTypeEnum $Type
     * @return \eLama\DirectApiV5\Dto\Ad\AdGetItem
     */
    public function setType($Type = null)
    {
      $this->Type = $Type;
      return $this;
    }

    /**
     * @return TextAdGet
     */
    public function getTextAd()
    {
      return $this->TextAd;
    }

    /**
     * @param TextAdGet $TextAd
     * @return \eLama\DirectApiV5\Dto\Ad\AdGetItem
     */
    public function setTextAd(TextAdGet $TextAd = null)
    {
      $this->TextAd = $TextAd;
      return $this;
    }

    /**
     * @return DynamicTextAdGet
     */
    public function getDynamicTextAd()
    {
      return $this->DynamicTextAd;
    }

    /**
     * @param DynamicTextAdGet $DynamicTextAd
     * @return \eLama\DirectApiV5\Dto\Ad\AdGetItem
     */
    public function setDynamicTextAd(DynamicTextAdGet $DynamicTextAd = null)
    {
      $this->DynamicTextAd = $DynamicTextAd;
      return $this;
    }

    /**
     * @return MobileAppAdGet
     */
    public function getMobileAppAd()
    {
      return $this->MobileAppAd;
    }

    /**
     * @param MobileAppAdGet $MobileAppAd
     * @return \eLama\DirectApiV5\Dto\Ad\AdGetItem
     */
    public function setMobileAppAd(MobileAppAdGet $MobileAppAd = null)
    {
      $this->MobileAppAd = $MobileAppAd;
      return $this;
    }

    public function toDomain()
    {
        $isImageExistsAndModerated =
            $this->getTextAd()->getAdImageHash() &&
            $this->getTextAd()->getAdImageModeration()->getStatus() != StatusEnum::DRAFT &&
            $this->getTextAd()->getAdImageModeration()->getStatus() != StatusEnum::REJECTED;

        $uri = $this->getTextAd()->getHref();
        $media = new AdMedia(
            $this->getTextAd()->getTitle(),
            $this->getTextAd()->getSiteLinkAdInfo(),
            $isImageExistsAndModerated,
            $this->getTextAd()->getVCardInfo(),
            $uri ? Http::createFromString($uri)
        );

        return new Ad(
            $this->getId(),
            $this->getAdGroupId(),
            $media
        );
    }
}
