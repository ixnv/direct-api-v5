<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\Campaign\Enum\TextCampaignNetworkStrategyTypeEnum as TextCampaignNetworkStrategyTypeEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        TextCampaignNetworkStrategyTypeEnum::class,
        TextCampaignNetworkStrategyTypeEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class TextCampaignNetworkStrategyTypeEnum extends TextCampaignNetworkStrategyTypeEnumBase {}
