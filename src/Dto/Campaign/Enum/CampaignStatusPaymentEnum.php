<?php

namespace eLama\DirectApiV5\Dto\Campaign\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class CampaignStatusPaymentEnum extends BaseEnum
{
    const __default = 'DISALLOWED';

    const DISALLOWED = 'DISALLOWED';
    const ALLOWED = 'ALLOWED';
}
