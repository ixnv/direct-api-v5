<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\Campaign\Enum\CheckPositionIntervalEnum as CheckPositionIntervalEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        CheckPositionIntervalEnum::class,
        CheckPositionIntervalEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class CheckPositionIntervalEnum extends CheckPositionIntervalEnumBase {}
