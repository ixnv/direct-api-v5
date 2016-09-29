<?php

namespace eLama\DirectApiV5\Dto\AdExtensions;

use eLama\DirectApiV5\Dto\General\ExtensionStatusSelectionEnum as ExtensionStatusSelectionEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        ExtensionStatusSelectionEnum::class,
        ExtensionStatusSelectionEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */
class ExtensionStatusSelectionEnum extends ExtensionStatusSelectionEnumBase {}
