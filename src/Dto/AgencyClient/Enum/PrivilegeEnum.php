<?php

namespace eLama\DirectApiV5\Dto\AgencyClient\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class PrivilegeEnum extends BaseEnum
{
    const __default = 'EDIT_CAMPAIGNS';

    const EDIT_CAMPAIGNS = 'EDIT_CAMPAIGNS';
    const IMPORT_XLS = 'IMPORT_XLS';
    const TRANSFER_MONEY = 'TRANSFER_MONEY';
}
