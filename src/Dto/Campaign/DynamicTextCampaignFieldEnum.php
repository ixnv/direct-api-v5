<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\Campaign\Enum\DynamicTextCampaignFieldEnum as DynamicTextCampaignFieldEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        DynamicTextCampaignFieldEnum::class,
        DynamicTextCampaignFieldEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class DynamicTextCampaignFieldEnum extends DynamicTextCampaignFieldEnumBase {}
