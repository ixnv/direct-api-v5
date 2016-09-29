<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\Campaign\Enum\MobileAppCampaignSettingsEnum as MobileAppCampaignSettingsEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        MobileAppCampaignSettingsEnum::class,
        MobileAppCampaignSettingsEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class MobileAppCampaignSettingsEnum extends MobileAppCampaignSettingsEnumBase {}
