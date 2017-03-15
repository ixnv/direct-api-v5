<?php

namespace eLama\DirectApiV5\Dto\RetargetingList\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class RetargetingListScopeEnum extends BaseEnum
{
    const __DEFAULT = 'FOR_TARGETS_AND_ADJUSTMENTS';

    const FOR_TARGETS_AND_ADJUSTMENTS = 'FOR_TARGETS_AND_ADJUSTMENTS';
    const FOR_ADJUSTMENTS_ONLY = 'FOR_ADJUSTMENTS_ONLY';
}
