<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\General\BaseEnum;

class CheckPositionIntervalEnum extends BaseEnum
{
    const __default = 60;

    const INTERVAL_15 = 15;
    const INTERVAL_30 = 30;
    const INTERVAL_60 = 60;
}
