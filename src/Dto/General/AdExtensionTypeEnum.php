<?php

namespace eLama\DirectApiV5\Dto\General;

use eLama\DirectApiV5\Dto\General\Enum\AdExtensionTypeEnum as AdExtensionTypeBaseEnum;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        AdExtensionTypeEnum::class,
        AdExtensionTypeBaseEnum::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class AdExtensionTypeEnum extends AdExtensionTypeBaseEnum {}
