<?php

namespace eLama\DirectApiV5\Dto\AgencyClient\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class EmailSubscriptionEnum extends BaseEnum
{
    const __default = 'RECEIVE_RECOMMENDATIONS';

    const RECEIVE_RECOMMENDATIONS = 'RECEIVE_RECOMMENDATIONS';
    const TRACK_MANAGED_CAMPAIGNS = 'TRACK_MANAGED_CAMPAIGNS';
    const TRACK_POSITION_CHANGES = 'TRACK_POSITION_CHANGES';
}
