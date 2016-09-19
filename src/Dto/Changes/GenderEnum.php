<?php

namespace eLama\DirectApiV5\Dto\Changes;

use eLama\DirectApiV5\Dto\General\GenderEnum as GenderEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        GenderEnum::class,
        GenderEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */
class GenderEnum extends GenderEnumBase {}
