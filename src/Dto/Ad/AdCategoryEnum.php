<?php

namespace eLama\DirectApiV5\Dto\Ad;

use eLama\DirectApiV5\Dto\Ad\Enum\AdCategoryEnum as AdCategoryEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        AdCategoryEnum::class,
        AdCategoryEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class AdCategoryEnum extends AdCategoryEnumBase {}
