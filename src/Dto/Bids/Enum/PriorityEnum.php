<?php

namespace eLama\DirectApiV5\Dto\Bids\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class PriorityEnum extends BaseEnum
{
    const __default = 'LOW';

    const LOW = 'LOW';
    const NORMAL = 'NORMAL';
    const HIGH = 'HIGH';
}
