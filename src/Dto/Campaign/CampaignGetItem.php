<?php


namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\General\ArrayOfString;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class CampaignGetItem extends CampaignBase
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
     * @JMS\Type("string")
     *
     * @var CampaignTypeGetEnum $Type
     */
    private $Type;

    /**
     * @JMS\Type("string")
     *
     * @var CampaignStatusGetEnum $Status
     */
    private $Status;

    /**
     * @JMS\Type("string")
     *
     * @var CampaignStateGetEnum $State
     */
    private $State;

    /**
     * @JMS\Type("string")
     *
     * @var CampaignStatusPaymentEnum $StatusPayment
     */
    private $StatusPayment;

    /**
     * @JMS\Type("string")
     *
     * @var string $StatusClarification
     */
    private $StatusClarification;

    /**
     * @JMS\Type("integer")
     *
     * @var int $SourceId
     */
    private $SourceId;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\Statistics")
     *
     * @var Statistics $Statistics
     */
    private $Statistics;

    /**
     * @JMS\Type("string")
     *
     * @var CurrencyEnum $Currency
     */
    private $Currency;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\FundsParam")
     *
     * @var FundsParam $Funds
     */
    private $Funds;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\CampaignAssistant")
     *
     * @var CampaignAssistant $RepresentedBy
     */
    private $RepresentedBy;

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
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\TextCampaignGetItem")
     *
     * @var TextCampaignGetItem $TextCampaign
     */
    private $TextCampaign;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\MobileAppCampaignGetItem")
     *
     * @var MobileAppCampaignGetItem $MobileAppCampaign
     */
    private $MobileAppCampaign;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\DynamicTextCampaignGetItem")
     *
     * @var DynamicTextCampaignGetItem $DynamicTextCampaign
     */
    private $DynamicTextCampaign;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\TimeTargeting")
     *
     * @var TimeTargeting $TimeTargeting
     */
    private $TimeTargeting;

    /**
     * @return int
     */
    public function getId()
    {
      return $this->Id;
    }

    /**
     * @param int $Id
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignGetItem
     */
    public function setId($Id = null)
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
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignGetItem
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
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignGetItem
     */
    public function setStartDate($StartDate = null)
    {
      $this->StartDate = $StartDate;
      return $this;
    }

    /**
     * @return CampaignTypeGetEnum
     */
    public function getType()
    {
      return $this->Type;
    }

    /**
     * @param CampaignTypeGetEnum $Type
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignGetItem
     */
    public function setType($Type = null)
    {
      $this->Type = $Type;
      return $this;
    }

    /**
     * @return string
     * @see CampaignStatusGetEnum
     */
    public function getStatus()
    {
      return $this->Status;
    }

    /**
     * @param CampaignStatusGetEnum $Status
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignGetItem
     */
    public function setStatus($Status = null)
    {
      $this->Status = $Status;
      return $this;
    }

    /**
     * @return CampaignStateGetEnum
     */
    public function getState()
    {
      return $this->State;
    }

    /**
     * @param CampaignStateGetEnum $State
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignGetItem
     */
    public function setState($State = null)
    {
      $this->State = $State;
      return $this;
    }

    /**
     * @return CampaignStatusPaymentEnum
     */
    public function getStatusPayment()
    {
      return $this->StatusPayment;
    }

    /**
     * @param CampaignStatusPaymentEnum $StatusPayment
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignGetItem
     */
    public function setStatusPayment($StatusPayment = null)
    {
      $this->StatusPayment = $StatusPayment;
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
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignGetItem
     */
    public function setStatusClarification($StatusClarification = null)
    {
      $this->StatusClarification = $StatusClarification;
      return $this;
    }

    /**
     * @return int
     */
    public function getSourceId()
    {
      return $this->SourceId;
    }

    /**
     * @param int $SourceId
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignGetItem
     */
    public function setSourceId($SourceId = null)
    {
      $this->SourceId = $SourceId;
      return $this;
    }

    /**
     * @return Statistics
     */
    public function getStatistics()
    {
      return $this->Statistics;
    }

    /**
     * @param Statistics $Statistics
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignGetItem
     */
    public function setStatistics(Statistics $Statistics = null)
    {
      $this->Statistics = $Statistics;
      return $this;
    }

    /**
     * @see CurrencyEnum
     * @return string
     */
    public function getCurrency()
    {
      return $this->Currency;
    }

    /**
     * @see CurrencyEnum
     * @param string $Currency
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignGetItem
     */
    public function setCurrency($Currency = null)
    {
      $this->Currency = $Currency;
      return $this;
    }

    /**
     * @return FundsParam
     */
    public function getFunds()
    {
      return $this->Funds;
    }

    /**
     * @param FundsParam $Funds
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignGetItem
     */
    public function setFunds(FundsParam $Funds = null)
    {
      $this->Funds = $Funds;
      return $this;
    }

    /**
     * @return CampaignAssistant
     */
    public function getRepresentedBy()
    {
      return $this->RepresentedBy;
    }

    /**
     * @param CampaignAssistant $RepresentedBy
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignGetItem
     */
    public function setRepresentedBy(CampaignAssistant $RepresentedBy = null)
    {
      $this->RepresentedBy = $RepresentedBy;
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
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignGetItem
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
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignGetItem
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
        if (!$NegativeKeywords) {
            $NegativeKeywords = new ArrayOfString();
        }
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
     * @return TextCampaignGetItem
     */
    public function getTextCampaign()
    {
      return $this->TextCampaign;
    }

    /**
     * @param TextCampaignGetItem $TextCampaign
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignGetItem
     */
    public function setTextCampaign(TextCampaignGetItem $TextCampaign = null)
    {
      $this->TextCampaign = $TextCampaign;
      return $this;
    }

    /**
     * @return MobileAppCampaignGetItem
     */
    public function getMobileAppCampaign()
    {
      return $this->MobileAppCampaign;
    }

    /**
     * @param MobileAppCampaignGetItem $MobileAppCampaign
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignGetItem
     */
    public function setMobileAppCampaign(MobileAppCampaignGetItem $MobileAppCampaign = null)
    {
      $this->MobileAppCampaign = $MobileAppCampaign;
      return $this;
    }

    /**
     * @return DynamicTextCampaignGetItem
     */
    public function getDynamicTextCampaign()
    {
      return $this->DynamicTextCampaign;
    }

    /**
     * @param DynamicTextCampaignGetItem $DynamicTextCampaign
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignGetItem
     */
    public function setDynamicTextCampaign(DynamicTextCampaignGetItem $DynamicTextCampaign = null)
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
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignGetItem
     */
    public function setTimeTargeting(TimeTargeting $TimeTargeting = null)
    {
      $this->TimeTargeting = $TimeTargeting;
      return $this;
    }
}
