<?php

namespace eLama\DirectApiV5\Dto\AdGroup;

use eLama\DirectApiV5\Dto\AdGroup\Enum\MobileAppAdGroupFieldEnum as MobileAppAdGroupFieldEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        MobileAppAdGroupFieldEnum::class,
        MobileAppAdGroupFieldEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class MobileAppAdGroupFieldEnum extends MobileAppAdGroupFieldEnumBase {}
