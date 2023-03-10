<?php

namespace eLama\DirectApiV5\Dto\AgencyClient\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class ClientRestrictionEnum extends BaseEnum
{
    const __default = 'ADGROUPS_TOTAL_PER_CAMPAIGN';

    const ADGROUPS_TOTAL_PER_CAMPAIGN = 'ADGROUPS_TOTAL_PER_CAMPAIGN';
    const ADS_TOTAL_PER_ADGROUP = 'ADS_TOTAL_PER_ADGROUP';
    const API_POINTS = 'API_POINTS';
    const CAMPAIGNS_TOTAL_PER_CLIENT = 'CAMPAIGNS_TOTAL_PER_CLIENT';
    const CAMPAIGNS_UNARCHIVED_PER_CLIENT = 'CAMPAIGNS_UNARCHIVED_PER_CLIENT';
    const FORECAST_REPORTS_TOTAL_IN_QUEUE = 'FORECAST_REPORTS_TOTAL_IN_QUEUE';
    const KEYWORDS_TOTAL_PER_ADGROUP = 'KEYWORDS_TOTAL_PER_ADGROUP';
    const STAT_REPORTS_TOTAL_IN_QUEUE = 'STAT_REPORTS_TOTAL_IN_QUEUE';
    const WORDSTAT_REPORTS_TOTAL_IN_QUEUE = 'WORDSTAT_REPORTS_TOTAL_IN_QUEUE';
    const AD_EXTENSIONS_TOTAL = 'AD_EXTENSIONS_TOTAL';
}
