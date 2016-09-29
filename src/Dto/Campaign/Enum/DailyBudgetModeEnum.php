<?php

namespace eLama\DirectApiV5\Dto\Campaign\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class DailyBudgetModeEnum extends BaseEnum
{
    const __default = 'STANDARD';

    const STANDARD = 'STANDARD';
    const DISTRIBUTED = 'DISTRIBUTED';
}
