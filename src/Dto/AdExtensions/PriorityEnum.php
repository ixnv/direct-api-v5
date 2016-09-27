<?php

namespace eLama\DirectApiV5\Dto\AdExtensions;

use eLama\DirectApiV5\Dto\General\PriorityEnum as PriorityEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        PriorityEnum::class,
        PriorityEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */
class PriorityEnum extends PriorityEnumBase {}
