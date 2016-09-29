<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\Campaign\Enum\DynamicTextCampaignSettingsGetEnum as DynamicTextCampaignSettingsGetEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        DynamicTextCampaignSettingsGetEnum::class,
        DynamicTextCampaignSettingsGetEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class DynamicTextCampaignSettingsGetEnum extends DynamicTextCampaignSettingsGetEnumBase {}
