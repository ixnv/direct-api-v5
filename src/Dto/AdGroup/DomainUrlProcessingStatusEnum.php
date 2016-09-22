<?php

namespace eLama\DirectApiV5\Dto\AdGroup;

use eLama\DirectApiV5\Dto\AdGroup\Enum\DomainUrlProcessingStatusEnum as DomainUrlProcessingStatusEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        DomainUrlProcessingStatusEnum::class,
        DomainUrlProcessingStatusEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class DomainUrlProcessingStatusEnum extends DomainUrlProcessingStatusEnumBase {}
