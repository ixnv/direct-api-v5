<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\General\BaseEnum;

class DynamicTextCampaignFieldEnum extends BaseEnum
{
    const __default = 'CounterIds';

    const CounterIds = 'CounterIds';
    const Settings = 'Settings';
    const BiddingStrategy = 'BiddingStrategy';
}
