<?php

namespace eLama\DirectApiV5\Dto\Client\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;
use JMS\Serializer\Annotation as JMS;

class RepresentativeRoleEnum extends BaseEnum
{
    const __default = 'CHIEF';

    const CHIEF = 'CHIEF';
    const DELEGATE = 'DELEGATE';
    const LIMITED = 'LIMITED';
    const UNKNOWN = 'UNKNOWN';
}
