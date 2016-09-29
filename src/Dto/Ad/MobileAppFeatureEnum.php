<?php

namespace eLama\DirectApiV5\Dto\Ad;

use eLama\DirectApiV5\Dto\Ad\Enum\MobileAppFeatureEnum as MobileAppFeatureEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        MobileAppFeatureEnum::class,
        MobileAppFeatureEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class MobileAppFeatureEnum extends MobileAppFeatureEnumBase {}
