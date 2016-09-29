<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\Campaign\Enum\CampaignStateGetEnum as CampaignStateGetEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        CampaignStateGetEnum::class,
        CampaignStateGetEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class CampaignStateGetEnum extends CampaignStateGetEnumBase {}
