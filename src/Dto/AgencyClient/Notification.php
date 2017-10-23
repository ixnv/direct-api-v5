<?php

namespace eLama\DirectApiV5\Dto\AgencyClient;

use JMS\Serializer\Annotation as JMS;
use eLama\DirectApiV5\Dto\General\Enum\LangEnum;

class Notification
{
    /**
     * @JMS\Type("string")
     *
     * @var string $Email
     */
    protected $Email;

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\AgencyClient\EmailSubscriptionItem>")
     *
     * @var EmailSubscriptionItem[] $EmailSubscriptions
     */
    protected $EmailSubscriptions;

    /**
     * @JMS\Type("string")
     *
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
    public function setEmailSubscriptions(array $EmailSubscriptions)
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
    public function setLang($Lang)
    {
        $this->Lang = $Lang;
    
        return $this;
    }
}
