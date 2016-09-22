<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\Campaign\Enum\CampaignStatusEnum as CampaignStatusEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        CampaignStatusEnum::class,
        CampaignStatusEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class CampaignStatusEnum extends CampaignStatusEnumBase {}
