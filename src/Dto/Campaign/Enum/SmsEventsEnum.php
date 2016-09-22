<?php

namespace eLama\DirectApiV5\Dto\Campaign\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class SmsEventsEnum extends BaseEnum
{
    const __default = 'MONITORING';

    const MONITORING = 'MONITORING';
    const MODERATION = 'MODERATION';
    const MONEY_IN = 'MONEY_IN';
    const MONEY_OUT = 'MONEY_OUT';
    const FINISHED = 'FINISHED';
}
