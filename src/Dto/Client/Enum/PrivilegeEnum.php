<?php

namespace eLama\DirectApiV5\Dto\Client\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;
use JMS\Serializer\Annotation as JMS;

class PrivilegeEnum extends BaseEnum
{
    const __DEFAULT = 'EDIT_CAMPAIGNS';

    const EDIT_CAMPAIGNS = 'EDIT_CAMPAIGNS';
    const IMPORT_XLS = 'IMPORT_XLS';
    const TRANSFER_MONEY = 'TRANSFER_MONEY';
}
