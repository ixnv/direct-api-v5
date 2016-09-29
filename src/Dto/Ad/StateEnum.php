<?php

namespace eLama\DirectApiV5\Dto\Ad;

use eLama\DirectApiV5\Dto\General\StateEnum as StateEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        StateEnum::class,
        StateEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */
class StateEnum extends StateEnumBase {}
