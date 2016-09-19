<?php

namespace eLama\DirectApiV5\Dto\AdExtensions;

use eLama\DirectApiV5\Dto\General\BaseEnum;

class RoleEnum extends BaseEnum
{
    const __default = 'CHIEF';

    const CHIEF = 'CHIEF';
    const DELEGATE = 'DELEGATE';
    const CLIENT = 'CLIENT';
    const AGENCY = 'AGENCY';
    const MANAGER = 'MANAGER';
    const UNKNOWN = 'UNKNOWN';
}
