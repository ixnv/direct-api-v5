<?php

namespace eLama\DirectApiV5\Dto\AdGroup\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class AdGroupAppIconStatusSelectionEnum extends BaseEnum
{
    const __default = 'ACCEPTED';

    const ACCEPTED = 'ACCEPTED';
    const MODERATION = 'MODERATION';
    const REJECTED = 'REJECTED';
}
