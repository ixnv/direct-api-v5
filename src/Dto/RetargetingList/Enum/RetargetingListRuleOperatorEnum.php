<?php

namespace eLama\DirectApiV5\Dto\RetargetingList\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class RetargetingListRuleOperatorEnum extends BaseEnum
{
    const __DEFAULT = 'ALL';

    const ALL = 'ALL';
    const ANY = 'ANY';
    const NONE = 'NONE';
}
