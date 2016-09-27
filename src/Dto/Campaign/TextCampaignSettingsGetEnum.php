<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\Campaign\Enum\TextCampaignSettingsGetEnum as TextCampaignSettingsGetEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        TextCampaignSettingsGetEnum::class,
        TextCampaignSettingsGetEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class TextCampaignSettingsGetEnum extends TextCampaignSettingsGetEnumBase {}
