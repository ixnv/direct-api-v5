<?php

namespace eLama\DirectApiV5\Dto\AdExtensions;

use eLama\DirectApiV5\Dto\General\StatusEnum as StatusEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        StatusEnum::class,
        StatusEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */
class StatusEnum extends StatusEnumBase {}
