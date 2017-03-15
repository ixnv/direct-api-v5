<?php

namespace eLama\DirectApiV5\Dto\RetargetingList\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class RetargetingListFieldEnum extends BaseEnum
{
    const __DEFAULT = 'Id';

    const ID = 'Id';
    const NAME = 'Name';
    const DESCRIPTION = 'Description';
    const RULES = 'Rules';
    const IS_AVAILABLE = 'IsAvailable';
    const SCOPE = 'Scope';
}
