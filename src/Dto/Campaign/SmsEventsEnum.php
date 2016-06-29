<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

class SmsEventsEnum
{
    const __default = 'MONITORING';
    const MONITORING = 'MONITORING';
    const MODERATION = 'MODERATION';
    const MONEY_IN = 'MONEY_IN';
    const MONEY_OUT = 'MONEY_OUT';
    const FINISHED = 'FINISHED';
}
