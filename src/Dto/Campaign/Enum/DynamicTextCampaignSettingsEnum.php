<?php

namespace eLama\DirectApiV5\Dto\Campaign\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class DynamicTextCampaignSettingsEnum extends BaseEnum
{
    const __default = 'ADD_OPENSTAT_TAG';

    const ADD_OPENSTAT_TAG = 'ADD_OPENSTAT_TAG';
    const ADD_METRICA_TAG = 'ADD_METRICA_TAG';
    const ADD_TO_FAVORITES = 'ADD_TO_FAVORITES';
    const ENABLE_AREA_OF_INTEREST_TARGETING = 'ENABLE_AREA_OF_INTEREST_TARGETING';
    const ENABLE_SITE_MONITORING = 'ENABLE_SITE_MONITORING';
    const ENABLE_BEHAVIORAL_TARGETING = 'ENABLE_BEHAVIORAL_TARGETING';
    const REQUIRE_SERVICING = 'REQUIRE_SERVICING';
    const ENABLE_EXTENDED_AD_TITLE = 'ENABLE_EXTENDED_AD_TITLE';
}
