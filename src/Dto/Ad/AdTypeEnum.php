<?php

namespace eLama\DirectApiV5\Dto\Ad;

use eLama\DirectApiV5\Dto\Ad\Enum\AdTypeEnum as AdTypeEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        AdTypeEnum::class,
        AdTypeEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class AdTypeEnum extends AdTypeEnumBase {}
