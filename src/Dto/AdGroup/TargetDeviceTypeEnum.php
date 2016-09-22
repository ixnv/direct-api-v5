<?php

namespace eLama\DirectApiV5\Dto\AdGroup;

use eLama\DirectApiV5\Dto\AdGroup\Enum\TargetDeviceTypeEnum as TargetDeviceTypeEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        TargetDeviceTypeEnum::class,
        TargetDeviceTypeEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class TargetDeviceTypeEnum extends TargetDeviceTypeEnumBase {}
