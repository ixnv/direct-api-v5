<?php

namespace eLama\DirectApiV5\Dto\AgencyClient;

class NotificationAdd extends Notification
{
    /**
     * @param string $Email
     * @param EmailSubscriptionItem[] $EmailSubscriptions
     * @param string $Lang
     */
    public function __construct($Email, array $EmailSubscriptions, $Lang)
    {
        parent::__construct($Email, $EmailSubscriptions, $Lang);
    }
}
