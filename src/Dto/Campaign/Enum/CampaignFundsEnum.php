<?php

namespace eLama\DirectApiV5\Dto\Campaign\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class CampaignFundsEnum extends BaseEnum
{
    const __default = 'CAMPAIGN_FUNDS';

    const CAMPAIGN_FUNDS = 'CAMPAIGN_FUNDS';
    const SHARED_ACCOUNT_FUNDS = 'SHARED_ACCOUNT_FUNDS';
}
