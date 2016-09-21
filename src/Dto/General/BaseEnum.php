<?php

namespace eLama\DirectApiV5\Dto\General;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum as GeneralEnum;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        BaseEnum::class,
        GeneralEnum::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class BaseEnum extends GeneralEnum {}
