<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\General\BaseEnum;

class CampaignFundsEnum extends BaseEnum
{
    const __default = 'CAMPAIGN_FUNDS';

    const CAMPAIGN_FUNDS = 'CAMPAIGN_FUNDS';
    const SHARED_ACCOUNT_FUNDS = 'SHARED_ACCOUNT_FUNDS';
}
