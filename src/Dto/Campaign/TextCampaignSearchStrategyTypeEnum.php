<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\Campaign\Enum\TextCampaignSearchStrategyTypeEnum as TextCampaignSearchStrategyTypeEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        TextCampaignSearchStrategyTypeEnum::class,
        TextCampaignSearchStrategyTypeEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class TextCampaignSearchStrategyTypeEnum extends TextCampaignSearchStrategyTypeEnumBase {}
