<?php

namespace eLama\DirectApiV5\Dto\Ad\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class AdStateEnum extends BaseEnum
{
    const SUSPENDED = 'SUSPENDED';
    const OFF_BY_MONITORING = 'OFF_BY_MONITORING';
    const ON = 'ON';
    const OFF = 'OFF';
    const ARCHIVED = 'ARCHIVED';
}
