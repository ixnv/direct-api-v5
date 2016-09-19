<?php

namespace eLama\DirectApiV5\Dto\Ad;

use eLama\DirectApiV5\Dto\General\AgeRangeEnum as AgeRangeEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        AgeRangeEnum::class,
        AgeRangeEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */
class AgeRangeEnum extends AgeRangeEnumBase {}
