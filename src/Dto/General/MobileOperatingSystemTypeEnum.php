<?php

namespace eLama\DirectApiV5\Dto\General;

use eLama\DirectApiV5\Dto\General\Enum\MobileOperatingSystemTypeEnum as MobileOperatingSystemTypeBaseEnum;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        MobileOperatingSystemTypeEnum::class,
        MobileOperatingSystemTypeBaseEnum::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class MobileOperatingSystemTypeEnum extends MobileOperatingSystemTypeBaseEnum {}
