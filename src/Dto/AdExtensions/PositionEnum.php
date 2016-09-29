<?php

namespace eLama\DirectApiV5\Dto\AdExtensions;

use eLama\DirectApiV5\Dto\General\PositionEnum as PositionEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        PositionEnum::class,
        PositionEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */
class PositionEnum extends PositionEnumBase {}
