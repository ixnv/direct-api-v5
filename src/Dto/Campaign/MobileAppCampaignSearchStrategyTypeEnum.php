<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\Campaign\Enum\MobileAppCampaignSearchStrategyTypeEnum as MobileAppCampaignSearchStrategyTypeEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        MobileAppCampaignSearchStrategyTypeEnum::class,
        MobileAppCampaignSearchStrategyTypeEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class MobileAppCampaignSearchStrategyTypeEnum extends MobileAppCampaignSearchStrategyTypeEnumBase {}
