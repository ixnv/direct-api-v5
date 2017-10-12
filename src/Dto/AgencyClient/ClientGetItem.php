<?php

namespace eLama\DirectApiV5;

use eLama\DirectApiV5\Dto\AgencyClient\ClientBaseItem;
use eLama\DirectApiV5\Dto\General\Enum\CurrencyEnum;
use eLama\DirectApiV5\Dto\General\Enum\YesNoEnum;

class ClientGetItem extends ClientBaseItem
{
    /**
     * @var float $accountQuality
     */
    protected $accountQuality;

    /**
     * @var YesNoEnum $archived
     */
    protected $archived;

    /**
     * @var int $clientId
     */
    protected $clientId;

    /**
     * @var int $countryId
     */
    protected $countryId;

    /**
     * @var string $createdAt
     */
    protected $createdAt;

    /**
     * @var CurrencyEnum $currency
     */
    protected $currency;

    /**
     * @var eLama\DirectApiV5\GeneralclientsGrantGetItem[] $grants
     */
    protected $grants;

    /**
     * @var string $login
     */
    protected $login;

    /**
     * @var eLama\DirectApiV5\GeneralclientsNotificationGet $notification
     */
    protected $notification;

    /**
     * @var int $overdraftSumAvailable
     */
    protected $overdraftSumAvailable;

    /**
     * @var eLama\DirectApiV5\GeneralclientsRepresentative[] $representatives
     */
    protected $representatives;

    /**
     * @var eLama\DirectApiV5\GeneralclientsClientRestrictionItem[] $restrictions
     */
    protected $restrictions;

    /**
     * @var eLama\DirectApiV5\GeneralclientsClientSettingGetItem[] $settings
     */
    protected $settings;

    /**
     * @var string $type
     */
    protected $type;

    /**
     * @var float $vatRate
     */
    protected $vatRate;

    /**
     * @return float
     */
    public function getAccountQuality()
    {
        return $this->accountQuality;
    }

    /**
     * @param float $accountQuality
     * @return self
     */
    public function setAccountQuality($accountQuality)
    {
        $this->accountQuality = $accountQuality;
    
        return $this;
    }

    /**
     * @return eLama\DirectApiV5\General\YesNoEnum
     */
    public function getArchived()
    {
        return $this->archived;
    }

    /**
     * @param eLama\DirectApiV5\General\YesNoEnum $archived
     * @return self
     */
    public function setArchived(YesNoEnum $archived = null)
    {
        $this->archived = $archived;
    
        return $this;
    }

    /**
     * @return int
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param int $clientId
     * @return self
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
    
        return $this;
    }

    /**
     * @return int
     */
    public function getCountryId()
    {
        return $this->countryId;
    }

    /**
     * @param int $countryId
     * @return self
     */
    public function setCountryId($countryId)
    {
        $this->countryId = $countryId;
    
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param string $createdAt
     * @return self
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    
        return $this;
    }

    /**
     * @return eLama\DirectApiV5\General\CurrencyEnum
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param eLama\DirectApiV5\General\CurrencyEnum $currency
     * @return self
     */
    public function setCurrency(CurrencyEnum $currency = null)
    {
        $this->currency = $currency;
    
        return $this;
    }

    /**
     * @return eLama\DirectApiV5\GeneralclientsGrantGetItem[]
     */
    public function getGrants()
    {
        return $this->grants;
    }

    /**
     * @param eLama\DirectApiV5\GeneralclientsGrantGetItem[] $grants
     * @return self
     */
    public function setGrants(array $grants = null)
    {
        $this->grants = $grants;
    
        return $this;
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param string $login
     * @return self
     */
    public function setLogin($login)
    {
        $this->login = $login;
    
        return $this;
    }

    /**
     * @return eLama\DirectApiV5\GeneralclientsNotificationGet
     */
    public function getNotification()
    {
        return $this->notification;
    }

    /**
     * @param eLama\DirectApiV5\GeneralclientsNotificationGet $notification
     * @return self
     */
    public function setNotification($notification)
    {
        $this->notification = $notification;
    
        return $this;
    }

    /**
     * @return int
     */
    public function getOverdraftSumAvailable()
    {
        return $this->overdraftSumAvailable;
    }

    /**
     * @param int $overdraftSumAvailable
     * @return self
     */
    public function setOverdraftSumAvailable($overdraftSumAvailable)
    {
        $this->overdraftSumAvailable = $overdraftSumAvailable;
    
        return $this;
    }

    /**
     * @return eLama\DirectApiV5\GeneralclientsRepresentative[]
     */
    public function getRepresentatives()
    {
        return $this->representatives;
    }

    /**
     * @param eLama\DirectApiV5\GeneralclientsRepresentative[] $representatives
     * @return self
     */
    public function setRepresentatives(array $representatives = null)
    {
        $this->representatives = $representatives;
    
        return $this;
    }

    /**
     * @return eLama\DirectApiV5\GeneralclientsClientRestrictionItem[]
     */
    public function getRestrictions()
    {
        return $this->restrictions;
    }

    /**
     * @param eLama\DirectApiV5\GeneralclientsClientRestrictionItem[] $restrictions
     * @return self
     */
    public function setRestrictions(array $restrictions = null)
    {
        $this->restrictions = $restrictions;
    
        return $this;
    }

    /**
     * @return eLama\DirectApiV5\GeneralclientsClientSettingGetItem[]
     */
    public function getSettings()
    {
        return $this->settings;
    }

    /**
     * @param eLama\DirectApiV5\GeneralclientsClientSettingGetItem[] $settings
     * @return self
     */
    public function setSettings(array $settings = null)
    {
        $this->settings = $settings;
    
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return self
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * @return float
     */
    public function getVatRate()
    {
        return $this->vatRate;
    }

    /**
     * @param float $vatRate
     * @return self
     */
    public function setVatRate($vatRate)
    {
        $this->vatRate = $vatRate;
    
        return $this;
    }
}
