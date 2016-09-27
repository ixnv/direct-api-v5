<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\Campaign\Enum\CampaignStateEnum as CampaignStateEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        CampaignStateEnum::class,
        CampaignStateEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class CampaignStateEnum extends CampaignStateEnumBase {}
