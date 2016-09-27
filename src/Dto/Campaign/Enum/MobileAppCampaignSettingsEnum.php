<?php

namespace eLama\DirectApiV5\Dto\Campaign\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class MobileAppCampaignSettingsEnum extends BaseEnum
{
    const __default = 'ADD_TO_FAVORITES';

    const ADD_TO_FAVORITES = 'ADD_TO_FAVORITES';
    const ENABLE_AREA_OF_INTEREST_TARGETING = 'ENABLE_AREA_OF_INTEREST_TARGETING';
    const ENABLE_BEHAVIORAL_TARGETING = 'ENABLE_BEHAVIORAL_TARGETING';
    const ENABLE_AUTOFOCUS = 'ENABLE_AUTOFOCUS';
    const REQUIRE_SERVICING = 'REQUIRE_SERVICING';
    const MAINTAIN_NETWORK_CPC = 'MAINTAIN_NETWORK_CPC';
}
