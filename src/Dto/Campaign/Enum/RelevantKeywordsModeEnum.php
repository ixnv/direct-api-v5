<?php

namespace eLama\DirectApiV5\Dto\Campaign\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class RelevantKeywordsModeEnum extends BaseEnum
{
    const __default = 'MINIMUM';

    const MINIMUM = 'MINIMUM';
    const OPTIMAL = 'OPTIMAL';
    const MAXIMUM = 'MAXIMUM';
}
