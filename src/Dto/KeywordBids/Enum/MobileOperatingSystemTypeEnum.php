<?php

namespace eLama\DirectApiV5\Dto\KeywordBids\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class MobileOperatingSystemTypeEnum extends BaseEnum
{
    const __default = 'IOS';

    const IOS = 'IOS';
    const ANDROID = 'ANDROID';
    const OS_TYPE_OTHER = 'OS_TYPE_OTHER';
    const OS_TYPE_UNKNOWN = 'OS_TYPE_UNKNOWN';
}
