<?php


namespace eLama\DirectApiV5\Dto\Keyword;

use eLama\DirectApiV5\Dto\General\BaseEnum;

class KeywordStateEnum extends BaseEnum
{
    const __default = 'OFF';
    const OFF = 'OFF';
    const ON = 'ON';
    const SUSPENDED = 'SUSPENDED';
    const UNKNOWN = 'UNKNOWN';
}
