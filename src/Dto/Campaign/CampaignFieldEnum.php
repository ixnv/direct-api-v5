<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\Campaign\Enum\CampaignFieldEnum as CampaignFieldEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        CampaignFieldEnum::class,
        CampaignFieldEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */
class CampaignFieldEnum extends CampaignFieldEnumBase {}
