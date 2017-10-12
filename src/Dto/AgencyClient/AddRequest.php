<?php

namespace eLama\DirectApiV5\Dto\AgencyClient;

use eLama\DirectApiV5\Dto\General\Enum\CurrencyEnum;

class AddRequest
{
    /**
     * @var string $login
     */
    private $login;

    /**
     * @var string $firstName
     */
    private $firstName;

    /**
     * @var string $lastName
     */
    private $lastName;

    /**
     * @var CurrencyEnum $currency
     */
    private $currency;

    /**
     * @var NotificationAdd $notification
     */
    private $notification;

    /**
     * @var eLama\DirectApiV5\GeneralclientsClientSettingAddItem[] $settings
     */
    private $settings;

    /**
     * @var eLama\DirectApiV5\GeneralclientsGrantItem[] $grants
     */
    private $grants;

    /**
     * @param string $login
     * @param string $firstName
     * @param string $lastName
     * @param CurrencyEnum $currency
     * @param NotificationAdd $notification
     */
    public function __construct($login, $firstName, $lastName, CurrencyEnum $currency, NotificationAdd $notification)
    {
        $this->login = $login;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->currency = $currency;
        $this->notification = $notification;
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
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return self
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return self
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    
        return $this;
    }

    /**
     * @return CurrencyEnum
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param CurrencyEnum $currency
     * @return self
     */
    public function setCurrency(CurrencyEnum $currency)
    {
        $this->currency = $currency;
    
        return $this;
    }

    /**
     * @return NotificationAdd
     */
    public function getNotification()
    {
        return $this->notification;
    }

    /**
     * @param NotificationAdd $notification
     * @return self
     */
    public function setNotification($notification)
    {
        $this->notification = $notification;
    
        return $this;
    }

    /**
     * @return eLama\DirectApiV5\GeneralclientsClientSettingAddItem[]
     */
    public function getSettings()
    {
        return $this->settings;
    }

    /**
     * @param eLama\DirectApiV5\GeneralclientsClientSettingAddItem[] $settings
     * @return self
     */
    public function setSettings(array $settings = null)
    {
        $this->settings = $settings;
    
        return $this;
    }

    /**
     * @return eLama\DirectApiV5\GeneralclientsGrantItem[]
     */
    public function getGrants()
    {
        return $this->grants;
    }

    /**
     * @param eLama\DirectApiV5\GeneralclientsGrantItem[] $grants
     * @return self
     */
    public function setGrants(array $grants = null)
    {
        $this->grants = $grants;
    
        return $this;
    }
}
