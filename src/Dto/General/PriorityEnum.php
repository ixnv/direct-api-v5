<?php

namespace eLama\DirectApiV5\Dto\General;

use eLama\DirectApiV5\Dto\General\Enum\PriorityEnum as PriorityBaseEnum;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        PriorityEnum::class,
        PriorityBaseEnum::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class PriorityEnum extends PriorityBaseEnum {}
