<?php

namespace eLama\DirectApiV5\Dto\Campaign\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class CampaignStateGetEnum extends BaseEnum
{
    const __default = 'ARCHIVED';

    const ARCHIVED = 'ARCHIVED';
    const CONVERTED = 'CONVERTED';
    const ENDED = 'ENDED';
    const OFF = 'OFF';
    const ON = 'ON';
    const SUSPENDED = 'SUSPENDED';
    const UNKNOWN = 'UNKNOWN';
}
