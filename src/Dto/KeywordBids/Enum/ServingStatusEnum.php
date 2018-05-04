<?php

namespace eLama\DirectApiV5\Dto\KeywordBids\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class ServingStatusEnum extends BaseEnum
{
    const __default = 'ELIGIBLE';

    const ELIGIBLE = 'ELIGIBLE';
    const RARELY_SERVED = 'RARELY_SERVED';
}
