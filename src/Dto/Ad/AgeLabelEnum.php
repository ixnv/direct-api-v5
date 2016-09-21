<?php

namespace eLama\DirectApiV5\Dto\Ad;

use eLama\DirectApiV5\Dto\Ad\Enum\AgeLabelEnum as AgeLabelEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        AgeLabelEnum::class,
        AgeLabelEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class AgeLabelEnum extends AgeLabelEnumBase {}
