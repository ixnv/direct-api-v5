<?php

namespace eLama\DirectApiV5;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class ClientSettingAddEnum extends BaseEnum
{
    const __default = 'CORRECT_TYPOS_AUTOMATICALLY';

    const CORRECT_TYPOS_AUTOMATICALLY = 'CORRECT_TYPOS_AUTOMATICALLY';
    const DISPLAY_STORE_RATING = 'DISPLAY_STORE_RATING';
}
