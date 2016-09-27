<?php

namespace eLama\DirectApiV5\Dto\Ad;

use eLama\DirectApiV5\Dto\Ad\Enum\DynamicTextAdFieldEnum as DynamicTextAdFieldEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        DynamicTextAdFieldEnum::class,
        DynamicTextAdFieldEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class DynamicTextAdFieldEnum extends DynamicTextAdFieldEnumBase {}
