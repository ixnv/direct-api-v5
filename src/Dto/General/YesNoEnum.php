<?php

namespace eLama\DirectApiV5\Dto\General;

use eLama\DirectApiV5\Dto\General\Enum\YesNoEnum as YesNoBaseEnum;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        YesNoEnum::class,
        YesNoBaseEnum::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class YesNoEnum extends YesNoBaseEnum {}
