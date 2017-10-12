<?php

namespace eLama\DirectApiV5\Dto\AgencyClient;

use eLama\DirectApiV5\Dto\General\Enum\LangEnum;

class Notification
{
    /**
     * @var string $email
     */
    protected $email;

    /**
     * @var EmailSubscriptionItem $emailSubscriptions
     */
    protected $emailSubscriptions;

    /**
     * @var LangEnum $lang
     */
    protected $lang;

    /**
     * @param string $email
     * @param EmailSubscriptionItem $emailSubscriptions
     * @param LangEnum $lang
     */
    public function __construct($email, $emailSubscriptions, LangEnum $lang)
    {
        $this->email = $email;
        $this->emailSubscriptions = $emailSubscriptions;
        $this->lang = $lang;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * @return EmailSubscriptionItem
     */
    public function getEmailSubscriptions()
    {
        return $this->emailSubscriptions;
    }

    /**
     * @param EmailSubscriptionItem $emailSubscriptions
     * @return self
     */
    public function setEmailSubscriptions($emailSubscriptions)
    {
        $this->emailSubscriptions = $emailSubscriptions;
    
        return $this;
    }

    /**
     * @return LangEnum
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * @param LangEnum $lang
     * @return self
     */
    public function setLang(LangEnum $lang)
    {
        $this->lang = $lang;
    
        return $this;
    }
}
