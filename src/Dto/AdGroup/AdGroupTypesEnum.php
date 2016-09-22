<?php

namespace eLama\DirectApiV5\Dto\AdGroup;

use eLama\DirectApiV5\Dto\AdGroup\Enum\AdGroupTypesEnum as AdGroupTypesEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        AdGroupTypesEnum::class,
        AdGroupTypesEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class AdGroupTypesEnum extends AdGroupTypesEnumBase {}
