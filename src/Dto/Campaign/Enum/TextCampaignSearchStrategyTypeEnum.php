<?php

namespace eLama\DirectApiV5\Dto\Campaign\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class TextCampaignSearchStrategyTypeEnum extends BaseEnum
{
    const __default = 'AVERAGE_CPC';

    /**
     * @deprecated
     * Удалены из Директ АПИ 28 июня 2017 г.
     * @link https://tech.yandex.ru/direct/doc/changelog/index-docpage/
     */
    const LOWEST_COST = 'LOWEST_COST';
    /**
     * @deprecated
     * Удалены из Директ АПИ 28 июня 2017 г.
     * @link https://tech.yandex.ru/direct/doc/changelog/index-docpage/
     */
    const LOWEST_COST_GUARANTEE = 'LOWEST_COST_GUARANTEE';
    /**
     * @deprecated
     * Удалены из Директ АПИ 28 июня 2017 г.
     * @link https://tech.yandex.ru/direct/doc/changelog/index-docpage/
     */
    const LOWEST_COST_PREMIUM = 'LOWEST_COST_PREMIUM';

    const AVERAGE_CPC = 'AVERAGE_CPC';
    const AVERAGE_CPA = 'AVERAGE_CPA';
    const WB_MAXIMUM_CONVERSION_RATE = 'WB_MAXIMUM_CONVERSION_RATE';
    const HIGHEST_POSITION = 'HIGHEST_POSITION';
    const IMPRESSIONS_BELOW_SEARCH = 'IMPRESSIONS_BELOW_SEARCH';
    const SERVING_OFF = 'SERVING_OFF';
    const UNKNOWN = 'UNKNOWN';
    const WB_MAXIMUM_CLICKS = 'WB_MAXIMUM_CLICKS';
    const WEEKLY_CLICK_PACKAGE = 'WEEKLY_CLICK_PACKAGE';
    const AVERAGE_ROI = 'AVERAGE_ROI';
}
