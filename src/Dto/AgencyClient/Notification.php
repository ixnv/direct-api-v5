<?php

namespace eLama\DirectApiV5\Dto\AgencyClient;

use eLama\DirectApiV5\Dto\General\Enum\LangEnum;

class Notification
{
    /**
     * @var string $Email
     */
    protected $Email;

    /**
     * @var EmailSubscriptionItem $EmailSubscriptions
     */
    protected $EmailSubscriptions;

    /**
     * @var LangEnum $Lang
     */
    protected $Lang;

    /**
     * @param string $Email
     * @param EmailSubscriptionItem[] $EmailSubscriptions
     * @param string $Lang
     */
    public function __construct($Email, array $EmailSubscriptions, $Lang)
    {
        $this->Email = $Email;
        $this->EmailSubscriptions = $EmailSubscriptions;
        $this->Lang = $Lang;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * @param string $Email
     * @return self
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;
    
        return $this;
    }

    /**
     * @return EmailSubscriptionItem[]
     */
    public function getEmailSubscriptions()
    {
        return $this->EmailSubscriptions;
    }

    /**
     * @param EmailSubscriptionItem[] $EmailSubscriptions
     * @return self
     */
    public function setEmailSubscriptions($EmailSubscriptions)
    {
        $this->EmailSubscriptions = $EmailSubscriptions;
    
        return $this;
    }

    /**
     * @return LangEnum
     */
    public function getLang()
    {
        return $this->Lang;
    }

    /**
     * @param LangEnum $Lang
     * @return self
     */
    public function setLang(LangEnum $Lang)
    {
        $this->Lang = $Lang;
    
        return $this;
    }
}
