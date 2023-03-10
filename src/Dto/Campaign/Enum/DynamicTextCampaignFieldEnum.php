<?php

namespace eLama\DirectApiV5\Dto\Campaign\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class DynamicTextCampaignFieldEnum extends BaseEnum
{
    const __default = 'CounterIds';

    const CounterIds = 'CounterIds';
    const Settings = 'Settings';
    const BiddingStrategy = 'BiddingStrategy';
}
