<?php

namespace eLama\DirectApiV5\Dto\AdGroup\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class TargetCarrierEnum extends BaseEnum
{
    const __default = 'WI_FI_ONLY';

    const WI_FI_ONLY = 'WI_FI_ONLY';
    const WI_FI_AND_CELLULAR = 'WI_FI_AND_CELLULAR';
}
