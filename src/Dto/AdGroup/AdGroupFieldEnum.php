<?php

namespace eLama\DirectApiV5\Dto\AdGroup;

use eLama\DirectApiV5\Dto\AdGroup\Enum\AdGroupFieldEnum as AdGroupFieldEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        AdGroupFieldEnum::class,
        AdGroupFieldEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */
class AdGroupFieldEnum extends AdGroupFieldEnumBase {}
