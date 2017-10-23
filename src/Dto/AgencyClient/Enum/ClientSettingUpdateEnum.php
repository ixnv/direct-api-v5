<?php

namespace eLama\DirectApiV5\Dto\AgencyClient\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class ClientSettingUpdateEnum extends BaseEnum
{
    const __default = 'CORRECT_TYPOS_AUTOMATICALLY';

    const CORRECT_TYPOS_AUTOMATICALLY = 'CORRECT_TYPOS_AUTOMATICALLY';
    const DISPLAY_STORE_RATING = 'DISPLAY_STORE_RATING';
}
