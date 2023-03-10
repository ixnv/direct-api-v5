<?php

namespace eLama\DirectApiV5\Dto\AgencyClient\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class ClientSettingGetEnum extends BaseEnum
{
    const __default = 'CORRECT_TYPOS_AUTOMATICALLY';

    const CORRECT_TYPOS_AUTOMATICALLY = 'CORRECT_TYPOS_AUTOMATICALLY';
    const DISPLAY_STORE_RATING = 'DISPLAY_STORE_RATING';
    const SHARED_ACCOUNT_ENABLED = 'SHARED_ACCOUNT_ENABLED';
}
