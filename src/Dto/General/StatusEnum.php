<?php

namespace eLama\DirectApiV5\Dto\General;

use eLama\DirectApiV5\Dto\General\Enum\StatusEnum as StatusBaseEnum;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        StatusEnum::class,
        StatusBaseEnum::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class StatusEnum extends StatusBaseEnum {}
