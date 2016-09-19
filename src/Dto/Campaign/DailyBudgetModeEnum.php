<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\General\BaseEnum;

class DailyBudgetModeEnum extends BaseEnum
{
    const __default = 'STANDARD';

    const STANDARD = 'STANDARD';
    const DISTRIBUTED = 'DISTRIBUTED';
}
