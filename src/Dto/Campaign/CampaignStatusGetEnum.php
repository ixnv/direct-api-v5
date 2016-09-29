<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\Campaign\Enum\CampaignStatusGetEnum as CampaignStatusGetEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        CampaignStatusGetEnum::class,
        CampaignStatusGetEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class CampaignStatusGetEnum extends CampaignStatusGetEnumBase {}
