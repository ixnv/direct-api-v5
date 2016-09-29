<?php

namespace eLama\DirectApiV5\Dto\Ad;

use eLama\DirectApiV5\Dto\General\AdExtensionStateSelectionEnum as AdExtensionStateSelectionEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        AdExtensionStateSelectionEnum::class,
        AdExtensionStateSelectionEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */
class AdExtensionStateSelectionEnum extends AdExtensionStateSelectionEnumBase {}
