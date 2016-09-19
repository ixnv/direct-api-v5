<?php

namespace eLama\DirectApiV5\Dto\Changes;

use eLama\DirectApiV5\Dto\General\MobileOperatingSystemTypeEnum as MobileOperatingSystemTypeEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        MobileOperatingSystemTypeEnum::class,
        MobileOperatingSystemTypeEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */
class MobileOperatingSystemTypeEnum extends MobileOperatingSystemTypeEnumBase {}
