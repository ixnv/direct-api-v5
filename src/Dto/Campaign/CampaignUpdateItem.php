<?php


namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\General\ArrayOfString;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class CampaignUpdateItem extends CampaignBase
{

    /**
     * @JMS\Type("integer")
     *
     * @var int $Id
     */
    private $Id;

    /**
     * @JMS\Type("string")
     *
     * @var string $Name
     */
    private $Name;

    /**
     * @JMS\Type("string")
     *
     * @var string $StartDate
     */
    private $StartDate;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\DailyBudget")
     *
     * @var DailyBudget $DailyBudget
     */
    private $DailyBudget;

    /**
     * @JMS\Type("string")
     *
     * @var string $EndDate
     */
    private $EndDate;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\General\ArrayOfString")
     *
     * @var ArrayOfString $NegativeKeywords
     */
    private $NegativeKeywords;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\General\ArrayOfString")
     *
     * @var ArrayOfString $BlockedIps
     */
    private $BlockedIps;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\General\ArrayOfString")
     *
     * @var ArrayOfString $ExcludedSites
     */
    private $ExcludedSites;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\TextCampaignUpdateItem")
     *
     * @var TextCampaignUpdateItem $TextCampaign
     */
    private $TextCampaign;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\MobileAppCampaignUpdateItem")
     *
     * @var MobileAppCampaignUpdateItem $MobileAppCampaign
     */
    private $MobileAppCampaign;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\DynamicTextCampaignUpdateItem")
     *
     * @var DynamicTextCampaignUpdateItem $DynamicTextCampaign
     */
    private $DynamicTextCampaign;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\TimeTargeting")
     *
     * @var TimeTargeting $TimeTargeting
     */
    private $TimeTargeting;

    /**
     * @param int $Id
     */
    public function __construct($Id)
    {
      $this->Id = $Id;
    }

    /**
     * @return int
     */
    public function getId()
    {
      return $this->Id;
    }

    /**
     * @param int $Id
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignUpdateItem
     */
    public function setId($Id)
    {
      $this->Id = $Id;
      return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
      return $this->Name;
    }

    /**
     * @param string $Name
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignUpdateItem
     */
    public function setName($Name = null)
    {
      $this->Name = $Name;
      return $this;
    }

    /**
     * @return string
     */
    public function getStartDate()
    {
      return $this->StartDate;
    }

    /**
     * @param string $StartDate
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignUpdateItem
     */
    public function setStartDate($StartDate = null)
    {
      $this->StartDate = $StartDate;
      return $this;
    }

    /**
     * @return DailyBudget
     */
    public function getDailyBudget()
    {
      return $this->DailyBudget;
    }

    /**
     * @param DailyBudget $DailyBudget
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignUpdateItem
     */
    public function setDailyBudget(DailyBudget $DailyBudget = null)
    {
      $this->DailyBudget = $DailyBudget;
      return $this;
    }

    /**
     * @return string
     */
    public function getEndDate()
    {
      return $this->EndDate;
    }

    /**
     * @param string $EndDate
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignUpdateItem
     */
    public function setEndDate($EndDate = null)
    {
      $this->EndDate = $EndDate;
      return $this;
    }

    /**
     * @return ArrayOfString
     */
    public function getNegativeKeywords()
    {
      return $this->NegativeKeywords;
    }

    /**
     * @param ArrayOfString $NegativeKeywords
     * @return self
     */
    public function setNegativeKeywords(ArrayOfString $NegativeKeywords = null)
    {
      $this->NegativeKeywords = $NegativeKeywords;
      return $this;
    }

    /**
     * @return ArrayOfString
     */
    public function getBlockedIps()
    {
      return $this->BlockedIps;
    }

    /**
     * @param ArrayOfString $BlockedIps
     * @return self
     */
    public function setBlockedIps(ArrayOfString $BlockedIps = null)
    {
      $this->BlockedIps = $BlockedIps;
      return $this;
    }

    /**
     * @return ArrayOfString
     */
    public function getExcludedSites()
    {
      return $this->ExcludedSites;
    }

    /**
     * @param ArrayOfString $ExcludedSites
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignUpdateItem
     */
    public function setExcludedSites(ArrayOfString $ExcludedSites = null)
    {
      $this->ExcludedSites = $ExcludedSites;
      return $this;
    }

    /**
     * @return TextCampaignUpdateItem
     */
    public function getTextCampaign()
    {
      return $this->TextCampaign;
    }

    /**
     * @param TextCampaignUpdateItem $TextCampaign
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignUpdateItem
     */
    public function setTextCampaign(TextCampaignUpdateItem $TextCampaign = null)
    {
      $this->TextCampaign = $TextCampaign;
      return $this;
    }

    /**
     * @return MobileAppCampaignUpdateItem
     */
    public function getMobileAppCampaign()
    {
      return $this->MobileAppCampaign;
    }

    /**
     * @param MobileAppCampaignUpdateItem $MobileAppCampaign
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignUpdateItem
     */
    public function setMobileAppCampaign(MobileAppCampaignUpdateItem $MobileAppCampaign = null)
    {
      $this->MobileAppCampaign = $MobileAppCampaign;
      return $this;
    }

    /**
     * @return DynamicTextCampaignUpdateItem
     */
    public function getDynamicTextCampaign()
    {
      return $this->DynamicTextCampaign;
    }

    /**
     * @param DynamicTextCampaignUpdateItem $DynamicTextCampaign
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignUpdateItem
     */
    public function setDynamicTextCampaign(DynamicTextCampaignUpdateItem $DynamicTextCampaign = null)
    {
      $this->DynamicTextCampaign = $DynamicTextCampaign;
      return $this;
    }

    /**
     * @return TimeTargeting
     */
    public function getTimeTargeting()
    {
      return $this->TimeTargeting;
    }

    /**
     * @param TimeTargeting $TimeTargeting
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignUpdateItem
     */
    public function setTimeTargeting(TimeTargeting $TimeTargeting = null)
    {
      $this->TimeTargeting = $TimeTargeting;
      return $this;
    }

}
