<?php

namespace eLama\DirectApiV5\Dto\Changes;

use eLama\DirectApiV5\Dto\Changes\Enum\CheckFieldEnum as CheckFieldEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        CheckFieldEnum::class,
        CheckFieldEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class CheckFieldEnum extends CheckFieldEnumBase {}
