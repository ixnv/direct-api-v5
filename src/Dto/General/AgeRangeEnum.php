<?php

namespace eLama\DirectApiV5\Dto\General;

use eLama\DirectApiV5\Dto\General\Enum\AgeRangeEnum as AgeRangeBaseEnum;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        AgeRangeEnum::class,
        AgeRangeBaseEnum::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class AgeRangeEnum extends AgeRangeBaseEnum {}
