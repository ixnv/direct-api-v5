<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\Campaign\Enum\DailyBudgetModeEnum as DailyBudgetModeEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        DailyBudgetModeEnum::class,
        DailyBudgetModeEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class DailyBudgetModeEnum extends DailyBudgetModeEnumBase {}
