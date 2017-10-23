<?php

namespace eLama\DirectApiV5\Dto\AgencyClient;

use JMS\Serializer\Annotation as JMS;

class NotificationGet extends Notification
{
    /**
     * @JMS\Type("string")
     *
     * @var string $SmsPhoneNumber
     */
    protected $SmsPhoneNumber;

    /**
     * @param string $email
     * @param EmailSubscriptionItem[] $emailSubscriptions
     * @param string $lang
     * @param string $smsPhoneNumber
     */
    public function __construct($email, array $emailSubscriptions, $lang, $smsPhoneNumber)
    {
        parent::__construct($email, $emailSubscriptions, $lang);
        $this->SmsPhoneNumber = $smsPhoneNumber;
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
     * @return self
     */
    public function setSmsPhoneNumber($SmsPhoneNumber)
    {
        $this->SmsPhoneNumber = $SmsPhoneNumber;
    
        return $this;
    }
}
