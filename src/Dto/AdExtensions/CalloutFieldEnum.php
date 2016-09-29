<?php

namespace eLama\DirectApiV5\Dto\AdExtensions;

use eLama\DirectApiV5\Dto\AdExtensions\Enum\CalloutFieldEnum as CalloutFieldEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        CalloutFieldEnum::class,
        CalloutFieldEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class CalloutFieldEnum extends CalloutFieldEnumBase {}
