<?php

namespace eLama\DirectApiV5\Dto\Keyword\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class KeywordStateEnum extends BaseEnum
{
    const __default = 'OFF';

    const OFF = 'OFF';
    const ON = 'ON';
    const SUSPENDED = 'SUSPENDED';
    const UNKNOWN = 'UNKNOWN';
}
