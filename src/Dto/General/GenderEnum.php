<?php

namespace eLama\DirectApiV5\Dto\General;

use eLama\DirectApiV5\Dto\General\Enum\GenderEnum as GenderBaseEnum;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        GenderEnum::class,
        GenderBaseEnum::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class GenderEnum extends GenderBaseEnum {}
