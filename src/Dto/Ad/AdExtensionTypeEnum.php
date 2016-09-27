<?php

namespace eLama\DirectApiV5\Dto\Ad;

use eLama\DirectApiV5\Dto\General\AdExtensionTypeEnum as AdExtensionTypeEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        AdExtensionTypeEnum::class,
        AdExtensionTypeEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */
class AdExtensionTypeEnum extends AdExtensionTypeEnumBase {}
