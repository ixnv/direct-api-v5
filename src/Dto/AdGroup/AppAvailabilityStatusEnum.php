<?php

namespace eLama\DirectApiV5\Dto\AdGroup;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class AppAvailabilityStatusEnum extends BaseEnum
{
    const __default = 'UNPROCESSED';

    const UNPROCESSED = 'UNPROCESSED';
    const AVAILABLE = 'AVAILABLE';
    const NOT_AVAILABLE = 'NOT_AVAILABLE';
}
