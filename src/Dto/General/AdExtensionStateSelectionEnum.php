<?php

namespace eLama\DirectApiV5\Dto\General;

use eLama\DirectApiV5\Dto\General\Enum\AdExtensionStateSelectionEnum as AdExtensionStateSelectionBaseEnum;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        AdExtensionStateSelectionEnum::class,
        AdExtensionStateSelectionBaseEnum::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class AdExtensionStateSelectionEnum extends AdExtensionStateSelectionBaseEnum {}
