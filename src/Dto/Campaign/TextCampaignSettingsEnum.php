<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\Campaign\Enum\TextCampaignSettingsEnum as TextCampaignSettingsEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        TextCampaignSettingsEnum::class,
        TextCampaignSettingsEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class TextCampaignSettingsEnum extends TextCampaignSettingsEnumBase {}
