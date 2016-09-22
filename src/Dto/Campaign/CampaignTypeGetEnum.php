<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\Campaign\Enum\CampaignTypeGetEnum as CampaignTypeGetEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        CampaignTypeGetEnum::class,
        CampaignTypeGetEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class CampaignTypeGetEnum extends CampaignTypeGetEnumBase {}
