<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\Campaign\Enum\MobileAppCampaignFieldEnum as MobileAppCampaignFieldEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        MobileAppCampaignFieldEnum::class,
        MobileAppCampaignFieldEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class MobileAppCampaignFieldEnum extends MobileAppCampaignFieldEnumBase {}
