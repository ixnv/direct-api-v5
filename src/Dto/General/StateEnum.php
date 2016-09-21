<?php

namespace eLama\DirectApiV5\Dto\General;

use eLama\DirectApiV5\Dto\General\Enum\StateEnum as StateBaseEnum;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        StateEnum::class,
        StateBaseEnum::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class StateEnum extends StateBaseEnum {}
