<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\General\BaseEnum;

class RelevantKeywordsModeEnum extends BaseEnum
{
    const __default = 'MINIMUM';

    const MINIMUM = 'MINIMUM';
    const OPTIMAL = 'OPTIMAL';
    const MAXIMUM = 'MAXIMUM';
}
