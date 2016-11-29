<?php

namespace eLama\DirectApiV5\Dto\Client;

use eLama\DirectApiV5\Dto\General\Enum\CurrencyEnum;
use eLama\DirectApiV5\Dto\General\Enum\YesNoEnum;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class ClientGetItem extends ClientBaseItem
{

    /**
     * @JMS\Type("double")
     *
     * @var float $AccountQuality
     */
    private $AccountQuality;

    /**
     * @JMS\Type("string")
     * @see YesNoEnum
     * @var string $Archived
     */
    private $Archived;

    /**
     * @JMS\Type("integer")
     *
     * @var int $ClientId
     */
    private $ClientId;

    /**
     * @JMS\Type("integer")
     *
     * @var int $CountryId
     */
    private $CountryId;

    /**
     * @JMS\Type("string")
     *
     * @var string $CreatedAt
     */
    private $CreatedAt;

    /**
     * @JMS\Type("string")
     * @see CurrencyEnum
     * @var string $Currency
     */
    private $Currency;

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Client\Grant>")
     *
     * @var Grant[] $Grants
     */
    private $Grants;

    /**
     * @JMS\Type("string")
     *
     * @var string $Login
     */
    private $Login;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Client\Notification")
     * @var Notification $Notification
     */
    private $Notification;

    /**
     * @JMS\Type("integer")
     *
     * @var int $OverdraftSumAvailable
     */
    private $OverdraftSumAvailable;

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Client\Representative>")
     *
     * @var Representative[] $Representatives
     */
    private $Representatives;

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Client\ClientRestrictionItem>")
     *
     * @var ClientRestrictionItem[] $Restrictions
     */
    private $Restrictions;

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Client\ClientSettingItemGet>")
     *
     * @var ClientSettingItemGet[] $Settings
     */
    private $Settings;

    /**
     * @JMS\Type("string")
     *
     * @var string $Type
     */
    private $Type;

    /**
     * @JMS\Type("double")
     *
     * @var float $VatRate
     */
    private $VatRate;

    /**
     * @return float
     */
    public function getAccountQuality()
    {
        return $this->AccountQuality;
    }

    /**
     * @param float $AccountQuality
     * @return \eLama\DirectApiV5\Dto\Client\ClientGetItem
     */
    public function setAccountQuality($AccountQuality = null)
    {
        $this->AccountQuality = $AccountQuality;
        return $this;
    }

    /**
     * @see YesNoEnum
     * @return string
     */
    public function getArchived()
    {
        return $this->Archived;
    }

    /**
     * @param YesNoEnum $Archived
     * @return \eLama\DirectApiV5\Dto\Client\ClientGetItem
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
     * @return \eLama\DirectApiV5\Dto\Client\ClientGetItem
     */
    public function setClientId($ClientId = null)
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
     * @return \eLama\DirectApiV5\Dto\Client\ClientGetItem
     */
    public function setCountryId($CountryId = null)
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
     * @return \eLama\DirectApiV5\Dto\Client\ClientGetItem
     */
    public function setCreatedAt($CreatedAt = null)
    {
        $this->CreatedAt = $CreatedAt;
        return $this;
    }

    /**
     * @return CurrencyEnum
     */
    public function getCurrency()
    {
        return $this->Currency;
    }

    /**
     * @param CurrencyEnum $Currency
     * @return \eLama\DirectApiV5\Dto\Client\ClientGetItem
     */
    public function setCurrency($Currency = null)
    {
        $this->Currency = $Currency;
        return $this;
    }

    /**
     * @return Grant[]
     */
    public function getGrants()
    {
        return $this->Grants;
    }

    /**
     * @param Grant[] $Grants
     * @return \eLama\DirectApiV5\Dto\Client\ClientGetItem
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
     * @return \eLama\DirectApiV5\Dto\Client\ClientGetItem
     */
    public function setLogin($Login = null)
    {
        $this->Login = $Login;
        return $this;
    }

    /**
     * @return Notification
     */
    public function getNotification()
    {
        return $this->Notification;
    }

    /**
     * @param Notification $Notification
     * @return \eLama\DirectApiV5\Dto\Client\ClientGetItem
     */
    public function setNotification(Notification $Notification = null)
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
     * @return \eLama\DirectApiV5\Dto\Client\ClientGetItem
     */
    public function setOverdraftSumAvailable($OverdraftSumAvailable = null)
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
     * @return \eLama\DirectApiV5\Dto\Client\ClientGetItem
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
     * @return \eLama\DirectApiV5\Dto\Client\ClientGetItem
     */
    public function setRestrictions(array $Restrictions = null)
    {
        $this->Restrictions = $Restrictions;
        return $this;
    }

    /**
     * @return ClientSettingItemGet[]
     */
    public function getSettings()
    {
        return $this->Settings;
    }

    /**
     * @param ClientSettingItemGet[] $Settings
     * @return \eLama\DirectApiV5\Dto\Client\ClientGetItem
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
     * @return \eLama\DirectApiV5\Dto\Client\ClientGetItem
     */
    public function setType($Type = null)
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
     * @return \eLama\DirectApiV5\Dto\Client\ClientGetItem
     */
    public function setVatRate($VatRate = null)
    {
        $this->VatRate = $VatRate;
        return $this;
    }
}
