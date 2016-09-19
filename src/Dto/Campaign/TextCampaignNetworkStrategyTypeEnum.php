<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\General\BaseEnum;

class TextCampaignNetworkStrategyTypeEnum extends BaseEnum
{
    const __default = 'AVERAGE_CPC';

    const AVERAGE_CPC = 'AVERAGE_CPC';
    const AVERAGE_CPA = 'AVERAGE_CPA';
    const WB_MAXIMUM_CONVERSION_RATE = 'WB_MAXIMUM_CONVERSION_RATE';
    const MAXIMUM_COVERAGE = 'MAXIMUM_COVERAGE';
    const NETWORK_DEFAULT = 'NETWORK_DEFAULT';
    const SERVING_OFF = 'SERVING_OFF';
    const UNKNOWN = 'UNKNOWN';
    const WB_MAXIMUM_CLICKS = 'WB_MAXIMUM_CLICKS';
    const WEEKLY_CLICK_PACKAGE = 'WEEKLY_CLICK_PACKAGE';
    const AVERAGE_ROI = 'AVERAGE_ROI';
}
