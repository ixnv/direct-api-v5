<?php

namespace eLama\DirectApiV5\Dto\KeywordBids\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class RepresentativeRoleEnum extends BaseEnum
{
    const __default = 'CHIEF';

    const CHIEF = 'CHIEF';
    const DELEGATE = 'DELEGATE';
    const LIMITED = 'LIMITED';
    const UNKNOWN = 'UNKNOWN';
}
