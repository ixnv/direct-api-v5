<?php

namespace eLama\DirectApiV5\Dto\AdGroup;

use eLama\DirectApiV5\Dto\AdGroup\Enum\TargetCarrierEnum as TargetCarrierEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        TargetCarrierEnum::class,
        TargetCarrierEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class TargetCarrierEnum extends TargetCarrierEnumBase {}
