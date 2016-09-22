<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\Campaign\Enum\TextCampaignFieldEnum as TextCampaignFieldEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        TextCampaignFieldEnum::class,
        TextCampaignFieldEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class TextCampaignFieldEnum extends TextCampaignFieldEnumBase {}
