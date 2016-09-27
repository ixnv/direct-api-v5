<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\Campaign\Enum\MobileAppCampaignSettingsGetEnum as MobileAppCampaignSettingsGetEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        MobileAppCampaignSettingsGetEnum::class,
        MobileAppCampaignSettingsGetEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class MobileAppCampaignSettingsGetEnum extends MobileAppCampaignSettingsGetEnumBase {}
