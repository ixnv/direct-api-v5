<?php

namespace eLama\DirectApiV5\Dto\AgencyClient;

use JMS\Serializer\Annotation as JMS;

class ClientGetItem extends ClientBaseItem
{
    /**
     * @JMS\Type("double")
     *
     * @var float $AccountQuality
     */
    protected $AccountQuality;

    /**
     * @JMS\Type("string")
     *
     * @var string $Archived
     */
    protected $Archived;

    /**
     * @JMS\Type("integer")
     *
     * @var int $ClientId
     */
    protected $ClientId;

    /**
     * @JMS\Type("integer")
     *
     * @var int $CountryId
     */
    protected $CountryId;

    /**
     * @JMS\Type("string")
     *
     * @var string $CreatedAt
     */
    protected $CreatedAt;

    /**
     * @JMS\Type("string")
     *
     * @var string $Currency
     */
    protected $Currency;

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\AgencyClient\GrantGetItem>")
     *
     * @var GrantGetItem[] $Grants
     */
    protected $Grants;

    /**
     * @JMS\Type("string")
     *
     * @var string $Login
     */
    protected $Login;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\AgencyClient\NotificationGet")
     *
     * @var NotificationGet $Notification
     */
    protected $Notification;

    /**
     * @JMS\Type("integer")
     *
     * @var int $OverdraftSumAvailable
     */
    protected $OverdraftSumAvailable;

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\AgencyClient\Representative>")
     *
     * @var Representative[] $Representatives
     */
    protected $Representatives;

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\AgencyClient\ClientRestrictionItem>")
     *
     * @var ClientRestrictionItem[] $Restrictions
     */
    protected $Restrictions;

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\AgencyClient\ClientSettingGetItem>")
     *
     * @var ClientSettingGetItem[] $Settings
     */
    protected $Settings;

    /**
     * @JMS\Type("string")
     *
     * @var string $Type
     */
    protected $Type;

    /**
     * @JMS\Type("double")
     *
     * @var float $VatRate
     */
    protected $VatRate;

    /**
     * @return float
     */
    public function getAccountQuality()
    {
        return $this->AccountQuality;
    }

    /**
     * @param float $AccountQuality
     * @return self
     */
    public function setAccountQuality($AccountQuality)
    {
        $this->AccountQuality = $AccountQuality;
    
        return $this;
    }

    /**
     * @return string
     */
    public function getArchived()
    {
        return $this->Archived;
    }

    /**
     * @param string $Archived
     * @return self
     */
    public function setArchived($Archived = null)
    {
        $this->Archived = $Archived;
    
        return $this;
    }

    /**
     * @return int
     */
    public function getClientId()
    {
        return $this->ClientId;
    }

    /**
     * @param int $ClientId
     * @return self
     */
    public function setClientId($ClientId)
    {
        $this->ClientId = $ClientId;
    
        return $this;
    }

    /**
     * @return int
     */
    public function getCountryId()
    {
        return $this->CountryId;
    }

    /**
     * @param int $CountryId
     * @return self
     */
    public function setCountryId($CountryId)
    {
        $this->CountryId = $CountryId;
    
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->CreatedAt;
    }

    /**
     * @param string $CreatedAt
     * @return self
     */
    public function setCreatedAt($CreatedAt)
    {
        $this->CreatedAt = $CreatedAt;
    
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->Currency;
    }

    /**
     * @param string $Currency
     * @return self
     */
    public function setCurrency($Currency = null)
    {
        $this->Currency = $Currency;
    
        return $this;
    }

    /**
     * @return GrantGetItem[]
     */
    public function getGrants()
    {
        return $this->Grants;
    }

    /**
     * @param GrantGetItem[] $Grants
     * @return self
     */
    public function setGrants(array $Grants = null)
    {
        $this->Grants = $Grants;
    
        return $this;
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->Login;
    }

    /**
     * @param string $Login
     * @return self
     */
    public function setLogin($Login)
    {
        $this->Login = $Login;
    
        return $this;
    }

    /**
     * @return NotificationGet
     */
    public function getNotification()
    {
        return $this->Notification;
    }

    /**
     * @param NotificationGet $Notification
     * @return self
     */
    public function setNotification($Notification)
    {
        $this->Notification = $Notification;
    
        return $this;
    }

    /**
     * @return int
     */
    public function getOverdraftSumAvailable()
    {
        return $this->OverdraftSumAvailable;
    }

    /**
     * @param int $OverdraftSumAvailable
     * @return self
     */
    public function setOverdraftSumAvailable($OverdraftSumAvailable)
    {
        $this->OverdraftSumAvailable = $OverdraftSumAvailable;
    
        return $this;
    }

    /**
     * @return Representative[]
     */
    public function getRepresentatives()
    {
        return $this->Representatives;
    }

    /**
     * @param Representative[] $Representatives
     * @return self
     */
    public function setRepresentatives(array $Representatives = null)
    {
        $this->Representatives = $Representatives;
    
        return $this;
    }

    /**
     * @return ClientRestrictionItem[]
     */
    public function getRestrictions()
    {
        return $this->Restrictions;
    }

    /**
     * @param ClientRestrictionItem[] $Restrictions
     * @return self
     */
    public function setRestrictions(array $Restrictions = null)
    {
        $this->Restrictions = $Restrictions;
    
        return $this;
    }

    /**
     * @return ClientSettingGetItem[]
     */
    public function getSettings()
    {
        return $this->Settings;
    }

    /**
     * @param ClientSettingGetItem[] $Settings
     * @return self
     */
    public function setSettings(array $Settings = null)
    {
        $this->Settings = $Settings;
    
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->Type;
    }

    /**
     * @param string $Type
     * @return self
     */
    public function setType($Type)
    {
        $this->Type = $Type;
    
        return $this;
    }

    /**
     * @return float
     */
    public function getVatRate()
    {
        return $this->VatRate;
    }

    /**
     * @param float $VatRate
     * @return self
     */
    public function setVatRate($VatRate)
    {
        $this->VatRate = $VatRate;
    
        return $this;
    }
}
