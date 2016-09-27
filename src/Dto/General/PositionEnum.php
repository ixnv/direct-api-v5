<?php

namespace eLama\DirectApiV5\Dto\General;

use eLama\DirectApiV5\Dto\General\Enum\PositionEnum as PositionBaseEnum;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        PositionEnum::class,
        PositionBaseEnum::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class PositionEnum extends PositionBaseEnum {}
