<?php

namespace eLama\DirectApiV5\Dto\Ad;

use eLama\DirectApiV5\Dto\General\SelectionCriteria;
use eLama\DirectApiV5\Dto\General\StatusEnum;
use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class AdsSelectionCriteria extends SelectionCriteria
{
    /**
     * @JMS\Type("array<integer>")
     *
     * @var int[] $Ids
     */
    private $Ids;

    /**
     * @JMS\Type("array<string>")
     *
     * @var string[]
     * @see StateEnum
     */
    private $States;

    /**
     * @JMS\Type("array<string>")
     *
     * @var string[]
     * @see StatusEnum
     */
    private $Statuses;

    /**
     * @JMS\Type("array<integer>")
     *
     * @var int[] $CampaignIds
     */
    protected $CampaignIds;

    /**
     * @JMS\Type("array<integer>")
     *
     * @var int[] $AdGroupIds
     */
    private $AdGroupIds;

    /**
     * @JMS\Type("array<string>")
     *
     * @var AdTypeEnum[] $Types
     */
    private $Types;

    /**
     * @JMS\Type("string")
     *
     * @var YesNoEnum $Mobile
     */
    private $Mobile;

    /**
     * @JMS\Type("array<integer>")
     *
     * @var int[] $VCardIds
     */
    private $VCardIds;

    /**
     * @JMS\Type("array<integer>")
     *
     * @var int[] $SitelinkSetIds
     */
    private $SitelinkSetIds;

    /**
     * @JMS\Type("array<string>")
     *
     * @var string[] $AdImageHashes
     */
    private $AdImageHashes;

    /**
     * @JMS\Type("array<string>")
     *
     * @var StatusEnum[] $VCardModerationStatuses
     */
    private $VCardModerationStatuses;

    /**
     * @JMS\Type("array<string>")
     *
     * @var StatusEnum[] $SitelinksModerationStatuses
     */
    private $SitelinksModerationStatuses;

    /**
     * @JMS\Type("array<string>")
     *
     * @var StatusEnum[] $AdImageModerationStatuses
     */
    private $AdImageModerationStatuses;

    /**
     * @return int[]
     */
    public function getIds()
    {
      return $this->Ids;
    }

    /**
     * @param int[] $Ids
     * @return \eLama\DirectApiV5\Dto\Ad\AdsSelectionCriteria
     */
    public function setIds(array $Ids = null)
    {
      $this->Ids = $Ids;
      return $this;
    }

    /**
     * @see StateEnum
     * @return string[]
     */
    public function getStates()
    {
      return $this->States;
    }

    /**
     * @see StateEnum
     * @param string[] $States
     * @return \eLama\DirectApiV5\Dto\Ad\AdsSelectionCriteria
     */
    public function setStates(array $States = null)
    {
      $this->States = $States;
      return $this;
    }

    /**
     * @return StatusEnum[]
     */
    public function getStatuses()
    {
      return $this->Statuses;
    }

    /**
     * @param StatusEnum[] $Statuses
     * @return \eLama\DirectApiV5\Dto\Ad\AdsSelectionCriteria
     */
    public function setStatuses(array $Statuses = null)
    {
      $this->Statuses = $Statuses;
      return $this;
    }

    /**
     * @return int[]
     */
    public function getAdGroupIds()
    {
      return $this->AdGroupIds;
    }

    /**
     * @param int[] $AdGroupIds
     * @return \eLama\DirectApiV5\Dto\Ad\AdsSelectionCriteria
     */
    public function setAdGroupIds(array $AdGroupIds = null)
    {
      $this->AdGroupIds = $AdGroupIds;
      return $this;
    }

    /**
     * @see AdTypeEnum
     * @return string[]
     */
    public function getTypes()
    {
      return $this->Types;
    }

    /**
     * @see AdTypeEnum
     * @param string[] $Types
     * @return self
     */
    public function setTypes(array $Types = null)
    {
      $this->Types = $Types;
      return $this;
    }

    /**
     * @return YesNoEnum
     */
    public function getMobile()
    {
      return $this->Mobile;
    }

    /**
     * @param YesNoEnum $Mobile
     * @return \eLama\DirectApiV5\Dto\Ad\AdsSelectionCriteria
     */
    public function setMobile($Mobile = null)
    {
      $this->Mobile = $Mobile;
      return $this;
    }

    /**
     * @return int[]
     */
    public function getVCardIds()
    {
      return $this->VCardIds;
    }

    /**
     * @param int[] $VCardIds
     * @return \eLama\DirectApiV5\Dto\Ad\AdsSelectionCriteria
     */
    public function setVCardIds(array $VCardIds = null)
    {
      $this->VCardIds = $VCardIds;
      return $this;
    }

    /**
     * @return int[]
     */
    public function getSitelinkSetIds()
    {
      return $this->SitelinkSetIds;
    }

    /**
     * @param int[] $SitelinkSetIds
     * @return \eLama\DirectApiV5\Dto\Ad\AdsSelectionCriteria
     */
    public function setSitelinkSetIds(array $SitelinkSetIds = null)
    {
      $this->SitelinkSetIds = $SitelinkSetIds;
      return $this;
    }

    /**
     * @return string[]
     */
    public function getAdImageHashes()
    {
      return $this->AdImageHashes;
    }

    /**
     * @param string[] $AdImageHashes
     * @return \eLama\DirectApiV5\Dto\Ad\AdsSelectionCriteria
     */
    public function setAdImageHashes(array $AdImageHashes = null)
    {
      $this->AdImageHashes = $AdImageHashes;
      return $this;
    }

    /**
     * @return StatusEnum[]
     */
    public function getVCardModerationStatuses()
    {
      return $this->VCardModerationStatuses;
    }

    /**
     * @param StatusEnum[] $VCardModerationStatuses
     * @return \eLama\DirectApiV5\Dto\Ad\AdsSelectionCriteria
     */
    public function setVCardModerationStatuses(array $VCardModerationStatuses = null)
    {
      $this->VCardModerationStatuses = $VCardModerationStatuses;
      return $this;
    }

    /**
     * @return StatusEnum[]
     */
    public function getSitelinksModerationStatuses()
    {
      return $this->SitelinksModerationStatuses;
    }

    /**
     * @param StatusEnum[] $SitelinksModerationStatuses
     * @return \eLama\DirectApiV5\Dto\Ad\AdsSelectionCriteria
     */
    public function setSitelinksModerationStatuses(array $SitelinksModerationStatuses = null)
    {
      $this->SitelinksModerationStatuses = $SitelinksModerationStatuses;
      return $this;
    }

    /**
     * @return StatusEnum[]
     */
    public function getAdImageModerationStatuses()
    {
      return $this->AdImageModerationStatuses;
    }

    /**
     * @param StatusEnum[] $AdImageModerationStatuses
     * @return \eLama\DirectApiV5\Dto\Ad\AdsSelectionCriteria
     */
    public function setAdImageModerationStatuses(array $AdImageModerationStatuses = null)
    {
      $this->AdImageModerationStatuses = $AdImageModerationStatuses;
      return $this;
    }
}
