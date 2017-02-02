<?php

namespace eLama\DirectApiV5\Dto\Client;

use eLama\DirectApiV5\Dto\General\Enum\LangEnum;
use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class Notification
{

    /**
     * @JMS\Type("string")
     *
     * @var string $Email
     */
    private $Email;

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Client\EmailSubscriptionItem>")
     *
     * @var EmailSubscriptionItem[] $EmailSubscriptions
     */
    private $EmailSubscriptions;

    /**
     * @JMS\Type("string")
     *
     * @var LangEnum $Lang
     */
    private $Lang;

    /**
     * @JMS\Type("string")
     *
     * @var string $SmsPhoneNumber
     */
    private $SmsPhoneNumber;

    /**
     * @param string $Email
     * @param EmailSubscriptionItem[] $EmailSubscriptions
     * @param LangEnum $Lang
     * @param string $SmsPhoneNumber
     */
    public function __construct($Email = null, array $EmailSubscriptions = null, $Lang = null, $SmsPhoneNumber = null)
    {
        $this->Email = $Email;
        $this->EmailSubscriptions = $EmailSubscriptions;
        $this->Lang = $Lang;
        $this->SmsPhoneNumber = $SmsPhoneNumber;
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
     * @return \eLama\DirectApiV5\Dto\Client\Notification
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
     * @return \eLama\DirectApiV5\Dto\Client\Notification
     */
    public function setEmailSubscriptions(array $EmailSubscriptions)
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
     * @return \eLama\DirectApiV5\Dto\Client\Notification
     */
    public function setLang($Lang)
    {
        $this->Lang = $Lang;
        return $this;
    }

    /**
     * @return string
     */
    public function getSmsPhoneNumber()
    {
        return $this->SmsPhoneNumber;
    }

    /**
     * @param string $SmsPhoneNumber
     * @return \eLama\DirectApiV5\Dto\Client\Notification
     */
    public function setSmsPhoneNumber($SmsPhoneNumber)
    {
        $this->SmsPhoneNumber = $SmsPhoneNumber;
        return $this;
    }

}
