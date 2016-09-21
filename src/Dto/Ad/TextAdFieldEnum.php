<?php

namespace eLama\DirectApiV5\Dto\Ad;

use eLama\DirectApiV5\Dto\Ad\Enum\TextAdFieldEnum as TextAdFieldEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        TextAdFieldEnum::class,
        TextAdFieldEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class TextAdFieldEnum extends TextAdFieldEnumBase {}
