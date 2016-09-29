<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\Campaign\Enum\MobileAppCampaignNetworkStrategyTypeEnum as MobileAppCampaignNetworkStrategyTypeEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        MobileAppCampaignNetworkStrategyTypeEnum::class,
        MobileAppCampaignNetworkStrategyTypeEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class MobileAppCampaignNetworkStrategyTypeEnum extends MobileAppCampaignNetworkStrategyTypeEnumBase {}
