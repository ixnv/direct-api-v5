<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\General\YesNoEnum as YesNoEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        YesNoEnum::class,
        YesNoEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */
class YesNoEnum extends YesNoEnumBase {}
