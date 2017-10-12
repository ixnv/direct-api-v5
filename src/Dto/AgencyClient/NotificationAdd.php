<?php

namespace eLama\DirectApiV5\Dto\AgencyClient;

use eLama\DirectApiV5\Dto\General\Enum\LangEnum;

class NotificationAdd extends Notification
{
    /**
     * @param string $email
     * @param EmailSubscriptionItem $emailSubscriptions
     * @param LangEnum $lang
     */
    public function __construct($email, $emailSubscriptions, LangEnum $lang)
    {
        parent::__construct($email, $emailSubscriptions, $lang);
    }
}
