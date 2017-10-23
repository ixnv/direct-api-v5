<?php

namespace eLama\DirectApiV5\Dto\AgencyClient;

class NotificationUpdate
{
    /**
     * @var string $Email
     */
    private $Email;

    /**
     * @var EmailSubscriptionItem[] $EmailSubscriptions
     */
    private $EmailSubscriptions;

    /**
     * @var string $Lang
     */
    private $Lang;

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
    public function setEmailSubscriptions(array $EmailSubscriptions = null)
    {
        $this->EmailSubscriptions = $EmailSubscriptions;
    
        return $this;
    }

    /**
     * @return string
     */
    public function getLang()
    {
        return $this->Lang;
    }

    /**
     * @param string $Lang
     * @return self
     */
    public function setLang($Lang = null)
    {
        $this->Lang = $Lang;
    
        return $this;
    }
}
