<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\General\BaseEnum;

class MobileAppCampaignSearchStrategyTypeEnum extends BaseEnum
{
    const __default = 'AVERAGE_CPC';

    const AVERAGE_CPC = 'AVERAGE_CPC';
    const AVERAGE_CPI = 'AVERAGE_CPI';
    const WB_MAXIMUM_APP_INSTALLS = 'WB_MAXIMUM_APP_INSTALLS';
    const HIGHEST_POSITION = 'HIGHEST_POSITION';
    const IMPRESSIONS_BELOW_SEARCH = 'IMPRESSIONS_BELOW_SEARCH';
    const LOWEST_COST = 'LOWEST_COST';
    const LOWEST_COST_GUARANTEE = 'LOWEST_COST_GUARANTEE';
    const LOWEST_COST_PREMIUM = 'LOWEST_COST_PREMIUM';
    const SERVING_OFF = 'SERVING_OFF';
    const UNKNOWN = 'UNKNOWN';
    const WB_MAXIMUM_CLICKS = 'WB_MAXIMUM_CLICKS';
    const WEEKLY_CLICK_PACKAGE = 'WEEKLY_CLICK_PACKAGE';
}
