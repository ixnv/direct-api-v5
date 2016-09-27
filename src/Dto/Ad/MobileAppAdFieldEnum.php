<?php

namespace eLama\DirectApiV5\Dto\Ad;

use eLama\DirectApiV5\Dto\Ad\Enum\MobileAppAdFieldEnum as MobileAppAdFieldEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        MobileAppAdFieldEnum::class,
        MobileAppAdFieldEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class MobileAppAdFieldEnum extends MobileAppAdFieldEnumBase {}
