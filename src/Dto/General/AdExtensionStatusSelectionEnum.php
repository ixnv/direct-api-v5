<?php

namespace eLama\DirectApiV5\Dto\General;

use eLama\DirectApiV5\Dto\General\Enum\AdExtensionStatusSelectionEnum as AdExtensionStatusSelectionBaseEnum;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        AdExtensionStatusSelectionEnum::class,
        AdExtensionStatusSelectionBaseEnum::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class AdExtensionStatusSelectionEnum extends AdExtensionStatusSelectionBaseEnum {}
