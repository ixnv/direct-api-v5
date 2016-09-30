<?php

namespace eLama\DirectApiV5\Dto\Bids\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class ScopeEnum extends BaseEnum
{
    const __default = 'SEARCH';

    const SEARCH = 'SEARCH';
    const NETWORK = 'NETWORK';
}
