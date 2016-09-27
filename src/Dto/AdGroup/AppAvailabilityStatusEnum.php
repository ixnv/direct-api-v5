<?php

namespace eLama\DirectApiV5\Dto\AdGroup;

use eLama\DirectApiV5\Dto\AdGroup\Enum\AppAvailabilityStatusEnum as AppAvailabilityStatusEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        AppAvailabilityStatusEnum::class,
        AppAvailabilityStatusEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */
class AppAvailabilityStatusEnum extends AppAvailabilityStatusEnumBase {}
