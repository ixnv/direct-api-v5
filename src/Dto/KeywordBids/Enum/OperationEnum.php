<?php

namespace eLama\DirectApiV5\Dto\KeywordBids\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class OperationEnum extends BaseEnum
{
    const __default = 'ADD';

    const ADD = 'ADD';
    const REMOVE = 'REMOVE';
    const SET = 'SET';
}
