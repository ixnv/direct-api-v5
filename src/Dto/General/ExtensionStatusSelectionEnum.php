<?php

namespace eLama\DirectApiV5\Dto\General;

use eLama\DirectApiV5\Dto\General\Enum\ExtensionStatusSelectionEnum as ExtensionStatusSelectionBaseEnum;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        ExtensionStatusSelectionEnum::class,
        ExtensionStatusSelectionBaseEnum::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class ExtensionStatusSelectionEnum extends ExtensionStatusSelectionBaseEnum {}
