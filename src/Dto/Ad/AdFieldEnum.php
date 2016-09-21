<?php

namespace eLama\DirectApiV5\Dto\Ad;

use eLama\DirectApiV5\Dto\Ad\Enum\AdFieldEnum as AdFieldEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        AdFieldEnum::class,
        AdFieldEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class AdFieldEnum extends AdFieldEnumBase {}
