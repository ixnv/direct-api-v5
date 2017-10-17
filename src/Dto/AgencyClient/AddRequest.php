<?php

namespace eLama\DirectApiV5\Dto\AgencyClient;

use eLama\DirectApiV5\Dto\General\Enum\CurrencyEnum;

class AddRequest
{
    /**
     * @var string $login
     */
    private $Login;

    /**
     * @var string $firstName
     */
    private $FirstName;

    /**
     * @var string $lastName
     */
    private $LastName;

    /**
     * @var CurrencyEnum $currency
     */
    private $Currency;

    /**
     * @var NotificationAdd $notification
     */
    private $Notification;

    /**
     * @var eLama\DirectApiV5\GeneralclientsClientSettingAddItem[] $settings
     */
    private $Settings;

    /**
     * @var eLama\DirectApiV5\GeneralclientsGrantItem[] $grants
     */
    private $Grants;

    /**
     * @param string $login
     * @param string $firstName
     * @param string $lastName
     * @param string $currency
     * @param NotificationAdd $notification
     */
    public function __construct($login, $firstName, $lastName, $currency, NotificationAdd $notification)
    {
        $this->Login = $login;
        $this->FirstName = $firstName;
        $this->LastName = $lastName;
        $this->Currency = $currency;
        $this->Notification = $notification;
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->Login;
    }

    /**
     * @param string $login
     * @return self
     */
    public function setLogin($login)
    {
        $this->Login = $login;
    
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->FirstName;
    }

    /**
     * @param string $firstName
     * @return self
     */
    public function setFirstName($firstName)
    {
        $this->FirstName = $firstName;
    
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->LastName;
    }

    /**
     * @param string $lastName
     * @return self
     */
    public function setLastName($lastName)
    {
        $this->LastName = $lastName;
    
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
     * @param CurrencyEnum $currency
     * @return self
     */
    public function setCurrency(CurrencyEnum $currency)
    {
        $this->Currency = $currency;
    
        return $this;
    }

    /**
     * @return NotificationAdd
     */
    public function getNotification()
    {
        return $this->Notification;
    }

    /**
     * @param NotificationAdd $notification
     * @return self
     */
    public function setNotification($notification)
    {
        $this->Notification = $notification;
    
        return $this;
    }

    /**
     * @return eLama\DirectApiV5\GeneralclientsClientSettingAddItem[]
     */
    public function getSettings()
    {
        return $this->Settings;
    }

    /**
     * @param eLama\DirectApiV5\GeneralclientsClientSettingAddItem[] $settings
     * @return self
     */
    public function setSettings(array $settings = null)
    {
        $this->Settings = $settings;
    
        return $this;
    }

    /**
     * @return eLama\DirectApiV5\GeneralclientsGrantItem[]
     */
    public function getGrants()
    {
        return $this->Grants;
    }

    /**
     * @param eLama\DirectApiV5\GeneralclientsGrantItem[] $grants
     * @return self
     */
    public function setGrants(array $grants = null)
    {
        $this->Grants = $grants;
    
        return $this;
    }
}
