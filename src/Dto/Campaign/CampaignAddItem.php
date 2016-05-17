<?php


namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\General\ArrayOfString;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class CampaignAddItem extends CampaignBase
{

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
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\TextCampaignAddItem")
     *
     * @var TextCampaignAddItem $TextCampaign
     */
    private $TextCampaign;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\MobileAppCampaignAddItem")
     *
     * @var MobileAppCampaignAddItem $MobileAppCampaign
     */
    private $MobileAppCampaign;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\DynamicTextCampaignAddItem")
     *
     * @var DynamicTextCampaignAddItem $DynamicTextCampaign
     */
    private $DynamicTextCampaign;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\TimeTargetingAdd")
     *
     * @var TimeTargetingAdd $TimeTargeting
     */
    private $TimeTargeting;

    /**
     * @param string $Name
     * @param string $StartDate
     */
    public function __construct($Name = null, $StartDate = null)
    {
      parent::__construct();
      $this->Name = $Name;
      $this->StartDate = $StartDate;
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
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignAddItem
     */
    public function setName($Name)
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
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignAddItem
     */
    public function setStartDate($StartDate)
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
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignAddItem
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
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignAddItem
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
     * @return self
     */
    public function setExcludedSites(ArrayOfString $ExcludedSites = null)
    {
      $this->ExcludedSites = $ExcludedSites;
      return $this;
    }

    /**
     * @return TextCampaignAddItem
     */
    public function getTextCampaign()
    {
      return $this->TextCampaign;
    }

    /**
     * @param TextCampaignAddItem $TextCampaign
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignAddItem
     */
    public function setTextCampaign(TextCampaignAddItem $TextCampaign = null)
    {
      $this->TextCampaign = $TextCampaign;
      return $this;
    }

    /**
     * @return MobileAppCampaignAddItem
     */
    public function getMobileAppCampaign()
    {
      return $this->MobileAppCampaign;
    }

    /**
     * @param MobileAppCampaignAddItem $MobileAppCampaign
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignAddItem
     */
    public function setMobileAppCampaign(MobileAppCampaignAddItem $MobileAppCampaign = null)
    {
      $this->MobileAppCampaign = $MobileAppCampaign;
      return $this;
    }

    /**
     * @return DynamicTextCampaignAddItem
     */
    public function getDynamicTextCampaign()
    {
      return $this->DynamicTextCampaign;
    }

    /**
     * @param DynamicTextCampaignAddItem $DynamicTextCampaign
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignAddItem
     */
    public function setDynamicTextCampaign(DynamicTextCampaignAddItem $DynamicTextCampaign = null)
    {
      $this->DynamicTextCampaign = $DynamicTextCampaign;
      return $this;
    }

    /**
     * @return TimeTargetingAdd
     */
    public function getTimeTargeting()
    {
      return $this->TimeTargeting;
    }

    /**
     * @param TimeTargetingAdd $TimeTargeting
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignAddItem
     */
    public function setTimeTargeting(TimeTargetingAdd $TimeTargeting = null)
    {
      $this->TimeTargeting = $TimeTargeting;
      return $this;
    }

}
