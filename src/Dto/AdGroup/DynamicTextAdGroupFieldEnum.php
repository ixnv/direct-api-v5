<?php

namespace eLama\DirectApiV5\Dto\AdGroup;

use eLama\DirectApiV5\Dto\AdGroup\Enum\DynamicTextAdGroupFieldEnum as DynamicTextAdGroupFieldEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        DynamicTextAdGroupFieldEnum::class,
        DynamicTextAdGroupFieldEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class DynamicTextAdGroupFieldEnum extends DynamicTextAdGroupFieldEnumBase {}
