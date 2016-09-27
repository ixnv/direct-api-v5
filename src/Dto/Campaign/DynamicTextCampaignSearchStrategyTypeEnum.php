<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\Campaign\Enum\DynamicTextCampaignSearchStrategyTypeEnum as DynamicTextCampaignSearchStrategyTypeEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        DynamicTextCampaignSearchStrategyTypeEnum::class,
        DynamicTextCampaignSearchStrategyTypeEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class DynamicTextCampaignSearchStrategyTypeEnum extends DynamicTextCampaignSearchStrategyTypeEnumBase {}
