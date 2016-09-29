<?php

namespace eLama\DirectApiV5\Dto\AdExtensions;

use eLama\DirectApiV5\Dto\AdExtensions\Enum\RoleEnum as RoleEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        RoleEnum::class,
        RoleEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class RoleEnum extends RoleEnumBase {}
