<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\Campaign\Enum\DynamicTextCampaignNetworkStrategyTypeEnum as DynamicTextCampaignNetworkStrategyTypeEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        DynamicTextCampaignNetworkStrategyTypeEnum::class,
        DynamicTextCampaignNetworkStrategyTypeEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class DynamicTextCampaignNetworkStrategyTypeEnum extends DynamicTextCampaignNetworkStrategyTypeEnumBase {}
