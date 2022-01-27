<?php

namespace eLama\DirectApiV5\Dto\Campaign\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class MobileAppCampaignSettingsGetEnum extends BaseEnum
{
    const __default = 'ADD_TO_FAVORITES';

    const ADD_TO_FAVORITES = 'ADD_TO_FAVORITES';
    const ENABLE_AREA_OF_INTEREST_TARGETING = 'ENABLE_AREA_OF_INTEREST_TARGETING';
    const ENABLE_BEHAVIORAL_TARGETING = 'ENABLE_BEHAVIORAL_TARGETING';
    const ENABLE_AUTOFOCUS = 'ENABLE_AUTOFOCUS';
    const REQUIRE_SERVICING = 'REQUIRE_SERVICING';
    const SHARED_ACCOUNT_ENABLED = 'SHARED_ACCOUNT_ENABLED';
    const DAILY_BUDGET_ALLOWED = 'DAILY_BUDGET_ALLOWED';
}
