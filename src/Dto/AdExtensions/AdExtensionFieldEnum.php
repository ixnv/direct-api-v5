<?php

namespace eLama\DirectApiV5\Dto\AdExtensions;

use eLama\DirectApiV5\Dto\AdExtensions\Enum\AdExtensionFieldEnum as AdExtensionFieldEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        AdExtensionFieldEnum::class,
        AdExtensionFieldEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class AdExtensionFieldEnum extends AdExtensionFieldEnumBase {}
