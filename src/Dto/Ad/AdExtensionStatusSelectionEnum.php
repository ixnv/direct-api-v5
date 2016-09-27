<?php

namespace eLama\DirectApiV5\Dto\Ad;

use eLama\DirectApiV5\Dto\General\AdExtensionStatusSelectionEnum as AdExtensionStatusSelectionEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        AdExtensionStatusSelectionEnum::class,
        AdExtensionStatusSelectionEnumBase::class
    ),
    E_USER_DEPRECATED
);


/**
 * @deprecated
 */
class AdExtensionStatusSelectionEnum extends AdExtensionStatusSelectionEnumBase {}
