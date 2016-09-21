<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class CampaignTypeEnum extends BaseEnum
{
    const __default = 'TEXT_CAMPAIGN';

    const TEXT_CAMPAIGN = 'TEXT_CAMPAIGN';
    const MOBILE_APP_CAMPAIGN = 'MOBILE_APP_CAMPAIGN';
    const DYNAMIC_TEXT_CAMPAIGN = 'DYNAMIC_TEXT_CAMPAIGN';
}
