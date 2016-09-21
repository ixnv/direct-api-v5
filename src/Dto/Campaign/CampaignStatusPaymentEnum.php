<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class CampaignStatusPaymentEnum extends BaseEnum
{
    const __default = 'DISALLOWED';

    const DISALLOWED = 'DISALLOWED';
    const ALLOWED = 'ALLOWED';
}
