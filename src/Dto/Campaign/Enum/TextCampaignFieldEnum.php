<?php

namespace eLama\DirectApiV5\Dto\Campaign\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class TextCampaignFieldEnum extends BaseEnum
{
    const __default = 'CounterIds';

    const CounterIds = 'CounterIds';
    const RelevantKeywords = 'RelevantKeywords';
    const Settings = 'Settings';
    const BiddingStrategy = 'BiddingStrategy';
}
